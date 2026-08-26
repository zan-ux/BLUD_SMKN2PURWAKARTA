<?php
// app/Http/Controllers/ServiceController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('profile')
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $profiles = Profile::all();
        return view('admin.services.create', compact('profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'requirements' => 'nullable|string',
            'is_online' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except(['image', 'is_online']);
        $data['is_online'] = $request->boolean('is_online');
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('services', $filename, 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function show(Service $service)
    {
        return view('admin.services.show', compact('service'));
    }

    public function edit(Service $service)
    {
        $profiles = Profile::all();
        return view('admin.services.edit', compact('service', 'profiles'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'nullable|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'requirements' => 'nullable|string',
            'is_online' => 'nullable|boolean',
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->except(['image', 'is_online']);
        $data['is_online'] = $request->boolean('is_online');
        
        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete($service->image);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('services', $filename, 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diupdate!');
    }

    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::delete($service->image);
        }

        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus!');
    }

    public function toggleStatus(Service $service)
    {
        $service->update([
            'status' => $service->status === 'active' ? 'inactive' : 'active'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Status layanan berhasil diubah',
            'status' => $service->status
        ]);
    }
}