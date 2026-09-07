<?php
// app/Http/Controllers/GoogleAuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class GoogleAuthController extends Controller
{
    public function redirect()
    {
        $query = http_build_query([
            'client_id' => env('GOOGLE_CLIENT_ID'),
            'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            'response_type' => 'code',
            'scope' => 'openid email profile',
        ]);

        return redirect('https://accounts.google.com/o/oauth2/v2/auth?' . $query);
    }

    public function callback(Request $request)
    {
        try {
            Log::info('Google callback dipanggil');
            
            // Exchange code untuk access token (dengan verify=false)
            $response = Http::withOptions([
                'verify' => false, // Nonaktifkan verifikasi SSL
            ])->post('https://oauth2.googleapis.com/token', [
                'client_id' => env('GOOGLE_CLIENT_ID'),
                'client_secret' => env('GOOGLE_CLIENT_SECRET'),
                'code' => $request->code,
                'grant_type' => 'authorization_code',
                'redirect_uri' => env('GOOGLE_REDIRECT_URI'),
            ]);

            $tokenData = $response->json();

            if (!isset($tokenData['access_token'])) {
                Log::error('Token tidak ditemukan:', $tokenData);
                return redirect()->route('login')->with('error', 'Token tidak ditemukan');
            }

            // Ambil user info (dengan verify=false)
            $userResponse = Http::withOptions([
                'verify' => false, // Nonaktifkan verifikasi SSL
            ])->withToken($tokenData['access_token'])
                ->get('https://www.googleapis.com/oauth2/v2/userinfo');

            $googleUser = $userResponse->json();

            Log::info('Google User:', $googleUser);

            // Cek apakah user sudah ada
            $existingUser = User::where('email', $googleUser['email'])->first();

            if ($existingUser) {
                Auth::login($existingUser);
                
                if ($existingUser->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }
                
                return redirect()->route('home');
            }

            // User baru - simpan data sementara
            Session::put('google_user', [
                'name' => $googleUser['name'],
                'email' => $googleUser['email'],
                'avatar' => $googleUser['picture'] ?? null,
                'google_id' => $googleUser['id'] ?? null,
            ]);

            return redirect()->route('google.complete-profile');

        } catch (\Exception $e) {
            Log::error('Error Google callback: ' . $e->getMessage());
            
            return redirect()->route('login')
                ->with('error', 'Gagal login dengan Google: ' . $e->getMessage());
        }
    }
    
    public function showCompleteProfile()
    {
        if (!Session::has('google_user')) {
            return redirect()->route('login');
        }
        
        $googleUser = Session::get('google_user');
        
        return view('auth.google-complete-profile', compact('googleUser'));
    }
    
    public function completeProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20|regex:/^[0-9+\-\s]+$/',
        ]);
        
        $googleUser = Session::get('google_user');
        
        if (!$googleUser) {
            return redirect()->route('login');
        }
        
        Log::info('Membuat user baru:', [
            'email' => $googleUser['email'],
            'name' => $request->name,
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $googleUser['email'],
            'password' => Hash::make(Str::random(24)),
            'phone' => $request->phone,
            'role' => 'viewer',
            'is_active' => true,
            'google_id' => $googleUser['google_id'],
            'avatar' => $googleUser['avatar'] ?? null,
        ]);
        
        Auth::login($user);
        
        Session::forget('google_user');
        
        return redirect()->route('home')
            ->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}