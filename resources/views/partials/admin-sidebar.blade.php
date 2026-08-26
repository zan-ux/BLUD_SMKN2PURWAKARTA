<aside id="sidebar" class="fixed inset-y-0 left-0 w-64 bg-white border-r border-gray-200 z-50 transform transition-transform duration-300 -translate-x-full lg:translate-x-0">
    <!-- Logo -->
    <div class="h-16 flex items-center gap-3 px-6 border-b border-gray-100">
        @php
            $profile = \App\Models\Profile::first();
        @endphp

        @if($profile && $profile->logo)
            <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-8 w-auto">
        @else
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 w-auto">
        @endif

        <span class="font-bold text-gray-900 text-sm">Admin BLUD</span>
    </div>

    <!-- Menu -->
    <nav class="p-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
            {{ request()->routeIs('admin.dashboard') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
            Dashboard
        </a>

        <a href="{{ route('admin.news.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
            {{ request()->routeIs('admin.news*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
            Manajemen Berita
        </a>

        <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
            {{ request()->routeIs('admin.services*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
            Manajemen Layanan
        </a>

        <a href="{{ route('admin.facilities.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
            {{ request()->routeIs('admin.facilities*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
            Manajemen Fasilitas
        </a>

        @php
            $organigram = \App\Models\Organigram::first();
        @endphp

        <!-- Edit Organigram -->
        @if($organigram)
            <a href="{{ route('admin.organigrams.edit', $organigram->id) }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
                {{ request()->routeIs('admin.organigrams*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Edit Organigram
            </a>
        @else
            <a href="{{ route('admin.organigrams.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
                {{ request()->routeIs('admin.organigrams*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                Buat Organigram
            </a>
        @endif
        <!-- Edit Profil BLUD -->
        @if($profile)
            <a href="{{ route('admin.profiles.edit', $profile->id) }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
                {{ request()->routeIs('admin.profiles*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Edit Profil BLUD
            </a>
        @else
            <a href="{{ route('admin.profiles.create') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
                {{ request()->routeIs('admin.profiles*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                Buat Profil BLUD
            </a>
        @endif

        <!-- User Management -->
        <a href="{{ route('admin.users.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition 
            {{ request()->routeIs('admin.users*') ? 'bg-green-900 text-white' : 'text-gray-600 hover:bg-gray-50 hover:text-green-900' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Manajemen User
        </a>
    </nav>

    <!-- Bottom Link -->
    <div class="absolute bottom-0 w-full p-4 border-t border-gray-100">
        <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2 text-sm text-gray-500 hover:text-green-900 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Kembali ke Situs
        </a>
    </div>
    <!-- Bottom Link -->
<div class="absolute bottom-0 w-full p-4 border-t border-gray-100">
    <a href="{{ route('home') }}" class="flex items-center gap-3 px-4 py-2 bg-green-900 text-white rounded-lg text-sm font-medium hover:bg-green-800 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
        Kembali ke Halaman Utama
    </a>
</div>
</aside>
