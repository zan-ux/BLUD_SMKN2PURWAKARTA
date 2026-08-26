<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use App\Models\FacilityCategory;
use App\Models\Profile;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Service Categories
    public function indexServices()
    {
        $categories = ServiceCategory::withCount('services')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.categories.services.index', compact('categories'));
    }

    public function storeService(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:100|unique:service_categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category = ServiceCategory::create($request->all());

        activity()->log('Created service category: ' . $category->name);

        return redirect()->route('categories.services.index')
            ->with('success', 'Kategori layanan berhasil ditambahkan!');
    }

    public function updateService(Request $request, ServiceCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:service_categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category->update($request->all());

        activity()->log('Updated service category: ' . $category->name);

        return redirect()->route('categories.services.index')
            ->with('success', 'Kategori layanan berhasil diupdate!');
    }

    public function destroyService(ServiceCategory $category)
    {
        $category->delete();

        activity()->log('Deleted service category: ' . $category->name);

        return redirect()->route('categories.services.index')
            ->with('success', 'Kategori layanan berhasil dihapus!');
    }

    // Facility Categories
    public function indexFacilities()
    {
        $categories = FacilityCategory::withCount('facilities')
            ->orderBy('name')
            ->paginate(10);

        return view('admin.categories.facilities.index', compact('categories'));
    }

    public function storeFacility(Request $request)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:100|unique:facility_categories,name',
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category = FacilityCategory::create($request->all());

        activity()->log('Created facility category: ' . $category->name);

        return redirect()->route('categories.facilities.index')
            ->with('success', 'Kategori fasilitas berhasil ditambahkan!');
    }

    public function updateFacility(Request $request, FacilityCategory $category)
    {
        $request->validate([
            'name' => 'required|string|max:100|unique:facility_categories,name,' . $category->id,
            'description' => 'nullable|string',
            'icon' => 'nullable|string|max:255',
        ]);

        $category->update($request->all());

        activity()->log('Updated facility category: ' . $category->name);

        return redirect()->route('categories.facilities.index')
            ->with('success', 'Kategori fasilitas berhasil diupdate!');
    }

    public function destroyFacility(FacilityCategory $category)
    {
        $category->delete();

        activity()->log('Deleted facility category: ' . $category->name);

        return redirect()->route('categories.facilities.index')
            ->with('success', 'Kategori fasilitas berhasil dihapus!');
    }
}