<?php
// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['is_active'] = true;

        // Jika user memilih login sebagai admin, cek role admin
        if ($request->has('admin_login') && $request->admin_login == '1') {
            $user = User::where('email', $request->email)->first();
            
            if ($user && $user->isAdmin() && Auth::attempt($credentials, $request->boolean('remember'))) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Login admin berhasil!');
            }
            
            throw ValidationException::withMessages([
                'email' => 'Email atau password admin salah. Pastikan Anda memiliki akses admin.',
            ]);
        }

        // Login biasa (user publik)
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Jika user adalah admin, arahkan ke dashboard admin
            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin.dashboard'))
                    ->with('success', 'Login berhasil! Selamat datang Admin.');
            }

            // User biasa diarahkan ke halaman publik
            return redirect()->intended(route('home'))
                ->with('success', 'Login berhasil!');
        }

        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')
            ->with('success', 'Logout berhasil!');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'nullable|string|max:20',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => 'viewer', // default role untuk user yang register
        ]);

        Auth::login($user);

        // User biasa diarahkan ke halaman publik
        return redirect()->route('home')
            ->with('success', 'Registrasi berhasil! Selamat datang.');
    }
}