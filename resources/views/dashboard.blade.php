@extends('layouts.admin')

@section('title', 'Dashboard - Admin BLUD')

@section('content')
<div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Page Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
        <p class="text-gray-500 mt-2">Selamat datang kembali, {{ auth()->user()->name }}!</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Services -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-3xl font-bold text-gray-900">{{ $stats['total_services'] }}</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600">Total Layanan</h3>
            <p class="text-xs text-gray-400 mt-1">{{ $stats['active_services'] }} aktif</p>
        </div>

        <!-- Total Facilities -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <span class="text-3xl font-bold text-gray-900">{{ $stats['total_facilities'] }}</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600">Total Fasilitas</h3>
            <p class="text-xs text-gray-400 mt-1">{{ $stats['available_facilities'] }} tersedia</p>
        </div>

        <!-- Total News -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path>
                    </svg>
                </div>
                <span class="text-3xl font-bold text-gray-900">{{ $stats['total_news'] }}</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600">Total Berita</h3>
            <p class="text-xs text-gray-400 mt-1">{{ $stats['published_news'] }} dipublikasi</p>
        </div>

        <!-- Unread Messages -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-red-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <span class="text-3xl font-bold text-gray-900">{{ $stats['unread_messages'] }}</span>
            </div>
            <h3 class="text-sm font-semibold text-gray-600">Pesan Baru</h3>
            <p class="text-xs text-gray-400 mt-1">Perlu dibalas</p>
        </div>
    </div>

    <!-- Recent News & Messages -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <!-- Recent News -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Berita Terbaru</h2>
                    <a href="{{ route('news.index') }}" class="text-sm text-green-800 hover:text-green-600">Lihat Semua →</a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($recentNews as $news)
                <div class="p-6 hover:bg-gray-50 transition">
                    <div class="flex items-start gap-4">
                        @if($news->image)
                            <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-16 h-16 rounded-lg object-cover">
                        @else
                            <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl text-gray-400">📰</span>
                            </div>
                        @endif
                        <div class="flex-1">
                            <h3 class="font-semibold text-gray-900 mb-1 line-clamp-1">{{ $news->title }}</h3>
                            <p class="text-sm text-gray-500 line-clamp-2">{{ $news->excerpt }}</p>
                            <div class="text-xs text-gray-400 mt-2">{{ $news->created_at->format('d M Y') }}</div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100">
            <div class="p-6 border-b border-gray-100">
                <div class="flex items-center justify-between">
                    <h2 class="text-lg font-semibold text-gray-900">Pesan Terbaru</h2>
                    <a href="{{ route('contact-messages.index') }}" class="text-sm text-green-800 hover:text-green-600">Lihat Semua →</a>
                </div>
            </div>
            <div class="divide-y divide-gray-100">
                @foreach($recentMessages as $message)
                <div class="p-6 hover:bg-gray-50 transition">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="text-green-800 font-bold">{{ substr($message->name, 0, 1) }}</span>
                        </div>
                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-1">
                                <h3 class="font-semibold text-gray-900">{{ $message->name }}</h3>
                                <span class="text-xs text-gray-400">{{ $message->created_at->format('d M') }}</span>
                            </div>
                            <p class="text-sm text-gray-500">{{ $message->subject }}</p>
                            <p class="text-xs text-gray-400 mt-1 line-clamp-1">{{ $message->message }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Monthly News Chart -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 mt-8">
        <div class="p-6 border-b border-gray-100">
            <h2 class="text-lg font-semibold text-gray-900">Statistik Berita per Bulan</h2>
        </div>
        <div class="p-6">
            <div class="flex items-end space-x-4 h-48">
                @foreach($monthlyNews as $stat)
                <div class="flex-1 flex flex-col items-center">
                    <div class="text-xs text-gray-500 mb-2">{{ $stat->total }}</div>
                    <div class="w-full bg-green-500 rounded-t-lg" style="height: {{ max($stat->total * 20, 10) }}px"></div>
                    <div class="text-xs text-gray-500 mt-2">{{ date('M', strtotime($stat->month)) }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection