<?php
// app/Http/Controllers/FacilityController.php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::with('profile')
            ->when(request('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when(request('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.facilities.index', compact('facilities'));
    }

    public function create()
    {
        $categories = \App\Models\FacilityCategory::all();
        $profiles = Profile::all();

        return view('admin.facilities.create', compact('categories', 'profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:50',
            'operating_hours' => 'nullable|string|max:255',
            'status' => 'required|in:available,maintenance,unavailable',
        ]);

        $data = $request->except(['image']);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('facilities', $filename, 'public');
        }

        Facility::create($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function show(Facility $facility)
    {
        return view('admin.facilities.show', compact('facility'));
    }

    public function edit(Facility $facility)
    {
        $categories = \App\Models\FacilityCategory::all();
        $profiles = Profile::all();

        return view('admin.facilities.edit', compact('facility', 'categories', 'profiles'));
    }

    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'location' => 'nullable|string|max:255',
            'capacity' => 'nullable|string|max:50',
            'operating_hours' => 'nullable|string|max:255',
            'status' => 'required|in:available,maintenance,unavailable',
        ]);

        $data = $request->except(['image']);
        
        if ($request->hasFile('image')) {
            if ($facility->image) {
                Storage::delete($facility->image);
            }
            $image = $request->file('image');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['image'] = $image->storeAs('facilities', $filename, 'public');
        }

        $facility->update($data);

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil diupdate!');
    }

    public function destroy(Facility $facility)
    {
        if ($facility->image) {
            Storage::delete($facility->image);
        }

        $facility->delete();

        return redirect()->route('admin.facilities.index')
            ->with('success', 'Fasilitas berhasil dihapus!');
    }

    public function updateStatus(Request $request, Facility $facility)
    {
        $request->validate([
            'status' => 'required|in:available,maintenance,unavailable',
        ]);

        $facility->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status fasilitas berhasil diubah',
            'data' => $facility
        ]);
    }
}