<?php
// app/Http/Controllers/PublicController.php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Facility;
use App\Models\News;
use App\Models\Organigram;
use App\Models\Profile;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $services = Service::where('status', 'active')->take(4)->get();
        $latestNews = News::published()->latest('published_at')->take(3)->get();
        
        return view('public.home', compact('services', 'latestNews'));
    }
    
    public function profile()
    {
        $profile = Profile::with('organigrams')->first();
        return view('public.profile', compact('profile'));
    }
    
    public function services()
    {
        $services = Service::where('status', 'active')->paginate(9);
        return view('public.services', compact('services'));
    }
    
    public function serviceShow(Service $service)
    {
        $relatedServices = Service::where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->where('status', 'active')
            ->take(3)
            ->get();

        return view('public.services-show', compact('service', 'relatedServices'));
    }
    
    public function facilities()
    {
        $facilities = Facility::where('status', 'available')->paginate(9);
        return view('public.facilities', compact('facilities'));
    }
    
    public function news()
    {
        $featuredNews = News::published()->latest('published_at')->first();
        $news = News::published()->latest('published_at')->paginate(9);
        
        return view('public.news', compact('featuredNews', 'news'));
    }
    
    public function newsShow($slug)
    {
        $news = News::published()->where('slug', $slug)->firstOrFail();
        $relatedNews = News::published()
            ->where('category', $news->category)
            ->where('id', '!=', $news->id)
            ->take(3)
            ->get();
            
        return view('public.news-show', compact('news', 'relatedNews'));
    }
    
    public function organigram()
    {
        $organigrams = Organigram::with(['children', 'parent'])->get();
        return view('public.organigram', compact('organigrams'));
    }
}