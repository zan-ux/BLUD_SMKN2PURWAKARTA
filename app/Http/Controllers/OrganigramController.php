<?php
// app/Http/Controllers/OrganigramController.php

namespace App\Http\Controllers;

use App\Models\Organigram;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrganigramController extends Controller
{
    public function index()
    {
        $organigrams = Organigram::with(['parent', 'children'])
            ->orderBy('order_number')
            ->paginate(10);

        return view('admin.organigrams.index', compact('organigrams'));
    }

    public function create()
    {
        $parents = Organigram::whereNull('parent_id')->get();
        $profiles = Profile::all();

        return view('admin.organigrams.create', compact('parents', 'profiles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:organigrams,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order_number' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['photo']);
        
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['photo'] = $image->storeAs('organigrams', $filename, 'public');
        }

        Organigram::create($data);

        return redirect()->route('admin.organigrams.index')
            ->with('success', 'Data organisasi berhasil ditambahkan!');
    }

    public function show(Organigram $organigram)
    {
        return view('admin.organigrams.show', compact('organigram'));
    }

    public function edit(Organigram $organigram)
    {
        $parents = Organigram::whereNull('parent_id')
            ->where('id', '!=', $organigram->id)
            ->get();
        $profiles = Profile::all();
        
        // Ambil semua organigram untuk ditampilkan di view
        $allOrganigrams = Organigram::with(['children'])
            ->orderBy('order_number')
            ->get();

        return view('admin.organigrams.edit', compact('organigram', 'parents', 'profiles', 'allOrganigrams'));
    }

    public function update(Request $request, Organigram $organigram)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'department' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:organigrams,id',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'order_number' => 'nullable|integer|min:0',
        ]);

        $data = $request->except(['photo']);
        
        if ($request->hasFile('photo')) {
            if ($organigram->photo) {
                Storage::delete($organigram->photo);
            }
            $image = $request->file('photo');
            $filename = time() . '_' . $image->getClientOriginalName();
            $data['photo'] = $image->storeAs('organigrams', $filename, 'public');
        }

        $organigram->update($data);

        return redirect()->route('admin.organigrams.index')
            ->with('success', 'Data organisasi berhasil diupdate!');
    }

    public function destroy(Organigram $organigram)
    {
        if ($organigram->photo) {
            Storage::delete($organigram->photo);
        }

        $organigram->delete();

        return redirect()->route('admin.organigrams.index')
            ->with('success', 'Data organisasi berhasil dihapus!');
    }

    public function getTree()
    {
        $organigrams = Organigram::with('childrenRecursive')
            ->whereNull('parent_id')
            ->get();

        return response()->json($organigrams);
    }
}