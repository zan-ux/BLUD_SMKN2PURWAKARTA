<header class="bg-white border-b border-gray-100 sticky top-0 z-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
<a href="{{ route('home') }}" class="flex items-center gap-3">
    @php
        $profile = \App\Models\Profile::first();
    @endphp

    @if($profile && $profile->logo)
        <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-10 w-auto">
    @else
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
    @endif

    <div class="leading-tight">
        <span class="font-bold text-gray-900 block text-sm">{{ $profile->institution_name ?? 'BLUD' }}</span>
        <span class="text-xs text-gray-500">{{ $profile->city ?? '' }}</span>
    </div>
</a>

            <!-- Navbar -->
            <nav class="hidden md:flex space-x-8">
                <a href="{{ route('home') }}" class="text-sm font-medium {{ request()->routeIs('home') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Beranda</a>
                <a href="{{ route('public.profile') }}" class="text-sm font-medium {{ request()->routeIs('public.profile') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Profil BLUD</a>
                <a href="{{ route('public.services') }}" class="text-sm font-medium {{ request()->routeIs('public.services*') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Layanan</a>
                <a href="{{ route('public.facilities') }}" class="text-sm font-medium {{ request()->routeIs('public.facilities*') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Fasilitas</a>
                <a href="{{ route('public.news') }}" class="text-sm font-medium {{ request()->routeIs('public.news*') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Berita</a>
                <a href="{{ route('public.organigram') }}" class="text-sm font-medium {{ request()->routeIs('public.organigram') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Organigram</a>
                <a href="{{ route('public.guide') }}" class="text-sm font-medium {{ request()->routeIs('public.guide') ? 'text-green-800 font-bold border-b-2 border-green-800' : 'text-gray-700 hover:text-green-800' }} pb-2">Petunjuk</a>

            </nav>

<!-- Auth Buttons -->
<div class="hidden md:flex items-center space-x-4">
    @auth
        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="text-sm text-gray-700 hover:text-green-800">Dashboard</a>
        @else
            <a href="{{ route('home') }}" class="text-sm text-gray-700 hover:text-green-800">Beranda</a>
        @endif
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-sm bg-green-900 text-white px-5 py-2 rounded-full hover:bg-green-800 transition">Keluar</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-green-800">Masuk</a>
        <a href="{{ route('register') }}" class="text-sm bg-green-900 text-white px-5 py-2 rounded-full hover:bg-green-800 transition">Daftar</a>
    @endauth
</div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-gray-700 focus:outline-none" onclick="toggleMobileMenu()">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
<div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
    <div class="px-4 py-4 space-y-3">
        <a href="{{ route('home') }}" class="block py-2 text-gray-700">Beranda</a>
        <a href="{{ route('public.profile') }}" class="block py-2 text-gray-700">Profil BLUD</a>
        <a href="{{ route('public.services') }}" class="block py-2 text-gray-700">Layanan</a>
        <a href="{{ route('public.facilities') }}" class="block py-2 text-gray-700">Fasilitas</a>
        <a href="{{ route('public.news') }}" class="block py-2 text-gray-700">Berita</a>
        <a href="{{ route('public.organigram') }}" class="block py-2 text-gray-700">Organigram</a>
        <hr class="border-gray-100">
        @auth
            @if(auth()->user()->isAdmin())
                <a href="{{ route('admin.dashboard') }}" class="block py-2 text-gray-700">Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="block">
                @csrf
                <button type="submit" class="block w-full text-left py-2 text-gray-700">Keluar</button>
            </form>
        @else
            <a href="{{ route('login') }}" class="block py-2 text-gray-700">Masuk</a>
            <a href="{{ route('register') }}" class="block py-2 text-white bg-green-900 text-center rounded-full">Daftar</a>
        @endauth
    </div>
</div>
</header>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }
</script>