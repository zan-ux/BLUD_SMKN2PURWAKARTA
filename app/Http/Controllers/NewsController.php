<?php
// app/Http/Controllers/NewsController.php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::with(['author', 'profile'])
            ->when(request('search'), function ($query, $search) {
                $query->where('title', 'like', "%{$search}%");
            })
            ->when(request('status'), function ($query, $status) {
                $query->where('status', $status);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $profiles = Profile::all();
        return view('admin.news.create', compact('profiles'));
    }

    public function store(Request $request)
    {
        // Log request untuk debugging
        Log::info('News store request:', $request->all());

        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = $request->except(['image']);
        
        // Auto-generate slug
        $data['slug'] = Str::slug($request->title) . '-' . Str::random(6);
        $data['created_by'] = auth()->id();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        // Set published_at jika status published
        if ($request->status === 'published') {
            $data['published_at'] = now();
        }

        try {
            $news = News::create($data);
            
            Log::info('News created successfully:', ['id' => $news->id]);
            
            return redirect()->route('admin.news.index')
                ->with('success', 'Berita berhasil dibuat!');
        } catch (\Exception $e) {
            Log::error('Failed to create news:', ['error' => $e->getMessage()]);
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan berita: ' . $e->getMessage());
        }
    }

    public function edit(News $news)
    {
        $profiles = Profile::all();
        return view('admin.news.edit', compact('news', 'profiles'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'nullable|string|max:100',
            'tags' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
        ]);

        $data = $request->except(['image']);
        
        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if ($request->status === 'published' && $news->status !== 'published') {
            $data['published_at'] = now();
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::delete($news->image);
        }

        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus!');
    }

    public function publish(News $news)
    {
        $news->update([
            'status' => 'published',
            'published_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Berita berhasil dipublikasikan!');
    }

    public function archive(News $news)
    {
        $news->update(['status' => 'archived']);

        return redirect()->back()->with('success', 'Berita berhasil diarsipkan!');
    }
}