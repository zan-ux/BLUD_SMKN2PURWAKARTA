<?php
// app/Http/Controllers/DashboardController.php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Service;
use App\Models\Facility;
use App\Models\News;
use App\Models\ContactMessage;
use App\Models\Organigram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_services' => Service::count(),
            'active_services' => Service::where('status', 'active')->count(),
            'total_facilities' => Facility::count(),
            'available_facilities' => Facility::where('status', 'available')->count(),
            'total_news' => News::count(),
            'published_news' => News::where('status', 'published')->count(),
            'unread_messages' => ContactMessage::where('status', 'new')->count(),
            'total_organigrams' => Organigram::count(),
        ];

        $recentNews = News::with('author')
            ->latest()
            ->take(5)
            ->get();

        $recentMessages = ContactMessage::latest()
            ->take(5)
            ->get();

        // Statistik berita per bulan
        $monthlyNews = News::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

        // Kirim semua variabel ke view
        return view('admin.dashboard', compact(
            'stats', 
            'recentNews', 
            'recentMessages', 
            'monthlyNews'
        ));
    }
}