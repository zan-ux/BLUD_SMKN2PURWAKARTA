<?php
// app/Http/Controllers/ProfileController.php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::with('user')
            ->when(request('search'), function ($query, $search) {
                $query->where('institution_name', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('admin.profiles.index', compact('profiles'));
    }

    public function create()
    {
        return view('admin.profiles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_type' => 'required|string|max:100',
            'address' => 'required|string',
            'city' => 'required|string|max:100',
            'province' => 'required|string|max:100',
            'postal_code' => 'required|string|max:10',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'website' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer|min:1900|max:'.date('Y'),
            'legal_basis' => 'nullable|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'description' => 'nullable|string',
            'sambutan' => 'nullable|string',
            'nama_kepala' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sejarah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sambutan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', 'foto_sejarah', 'foto_sambutan']);
        
        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profiles/logo', 'public');
        }
        
        if ($request->hasFile('foto_sejarah')) {
            $data['foto_sejarah'] = $request->file('foto_sejarah')->store('profiles/foto_sejarah', 'public');
        }
        
        if ($request->hasFile('foto_sambutan')) {
            $data['foto_sambutan'] = $request->file('foto_sambutan')->store('profiles/foto_sambutan', 'public');
        }

        $data['user_id'] = auth()->id();
        Profile::create($data);

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile berhasil dibuat!');
    }

    public function show(Profile $profile)
    {
        return view('admin.profiles.show', compact('profile'));
    }

    public function edit(Profile $profile)
    {
        return view('admin.profiles.edit', compact('profile'));
    }

    public function update(Request $request, Profile $profile)
    {
        $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_type' => 'nullable|string|max:100',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:100',
            'province' => 'nullable|string|max:100',
            'postal_code' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email',
            'website' => 'nullable|string|max:255',
            'established_year' => 'nullable|integer|min:1900|max:'.date('Y'),
            'legal_basis' => 'nullable|string|max:255',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'description' => 'nullable|string',
            'sambutan' => 'nullable|string',
            'nama_kepala' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sejarah' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_sambutan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->except(['logo', 'foto_sejarah', 'foto_sambutan']);
        
        if ($request->hasFile('logo')) {
            if ($profile->logo) {
                Storage::delete($profile->logo);
            }
            $data['logo'] = $request->file('logo')->store('profiles/logo', 'public');
        }
        
        if ($request->hasFile('foto_sejarah')) {
            if ($profile->foto_sejarah) {
                Storage::delete($profile->foto_sejarah);
            }
            $data['foto_sejarah'] = $request->file('foto_sejarah')->store('profiles/foto_sejarah', 'public');
        }
        
        if ($request->hasFile('foto_sambutan')) {
            if ($profile->foto_sambutan) {
                Storage::delete($profile->foto_sambutan);
            }
            $data['foto_sambutan'] = $request->file('foto_sambutan')->store('profiles/foto_sambutan', 'public');
        }

        $profile->update($data);

        return redirect()->route('admin.profiles.edit', $profile->id)
            ->with('success', 'Profile berhasil diupdate!');
    }

    public function destroy(Profile $profile)
    {
        if ($profile->logo) {
            Storage::delete($profile->logo);
        }
        if ($profile->foto_sejarah) {
            Storage::delete($profile->foto_sejarah);
        }
        if ($profile->foto_sambutan) {
            Storage::delete($profile->foto_sambutan);
        }

        $profile->delete();

        return redirect()->route('admin.profiles.index')
            ->with('success', 'Profile berhasil dihapus!');
    }
}
