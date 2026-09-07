@extends('layouts.public')

@section('title', 'Beranda - BLUD SMKN 2 Purwakarta')

@section('content')
@php
    $profile = \App\Models\Profile::first();
@endphp

<!-- Hero Section -->
<section class="relative bg-green-950 text-white overflow-hidden">
    <div class="absolute inset-0">
        @if($profile && $profile->foto_sejarah)
            <img src="{{ asset('storage/'.$profile->foto_sejarah) }}" alt="Gedung" class="w-full h-full object-cover opacity-20">
        @else
            <img src="{{ asset('images/gedung.jpg') }}" alt="Gedung" class="w-full h-full object-cover opacity-20">
        @endif
    </div>
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="max-w-2xl">
            <div data-aos="fade-up" data-aos-delay="100">
                <div class="inline-flex items-center gap-2 bg-green-900/50 backdrop-blur px-4 py-2 rounded-full mb-6 text-sm">
                    <span class="w-2 h-2 bg-yellow-400 rounded-full"></span>
                    Badan Layanan Umum Daerah
                </div>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="200">
                <h1 class="text-4xl lg:text-6xl font-extrabold leading-tight mb-6">
                    Layanan Warga, Satu Langkah Lebih Dekat
                </h1>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="300">
                <p class="text-lg text-green-100 mb-10 max-w-xl">
                    Menyediakan layanan publik yang profesional, transparan, dan inovatif melalui optimalisasi potensi vokasi SMKN 2 Purwakarta.
                </p>
            </div>
            
            <div data-aos="fade-up" data-aos-delay="400">
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('public.services') }}" class="bg-yellow-500 hover:bg-yellow-400 text-green-950 font-semibold px-8 py-3 rounded-full transition">
                        Jelajahi Layanan
                    </a>
                    <a href="{{ route('public.profile') }}" class="bg-white/10 hover:bg-white/20 backdrop-blur px-8 py-3 rounded-full transition">
                        Profil Kami
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Tentang BLUD Section -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <div class="relative">
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-yellow-400 rounded-full opacity-20 z-0"></div>
                    @if($profile && $profile->foto_sejarah)
                        <img src="{{ asset('storage/'.$profile->foto_sejarah) }}" alt="Sekolah" class="relative z-10 rounded-2xl shadow-2xl w-full h-[400px] object-cover">
                    @else
                        <img src="{{ asset('images/sekolah.jpg') }}" alt="Sekolah" class="relative z-10 rounded-2xl shadow-2xl w-full h-[400px] object-cover">
                    @endif
                </div>
            </div>
            
            <div data-aos="fade-left" data-aos-delay="200">
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Tentang BLUD</div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">
                    Membangun Kemandirian Melalui Inovasi Vokasi
                </h2>
                <p class="text-gray-600 mb-8 leading-relaxed">
                    BLUD SMKN 2 Purwakarta hadir sebagai wujud nyata komitmen kami dalam meningkatkan kualitas pelayanan publik sekaligus memberdayakan potensi siswa sebagai generasi vokasi yang unggul dan mandiri.
                </p>
                <ul class="space-y-4 mb-8">
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pelayanan Publik yang Akuntabel dan Transparan
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Produk dan Jasa Berkualitas Standar Industri
                    </li>
                    <li class="flex items-center gap-3 text-gray-700">
                        <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Pengembangan Kompetensi Peserta Didik
                    </li>
                </ul>
                <a href="{{ route('public.profile') }}" class="inline-flex items-center gap-2 text-green-800 font-semibold hover:text-green-600 transition">
                    Baca Profil Lengkap
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Layanan Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div data-aos="fade-up">
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Layanan Unggulan</div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Fasilitas & Layanan Publik Terbaik</h2>
            </div>
            <a href="{{ route('public.services') }}" class="hidden md:block bg-white border border-gray-200 text-gray-700 px-6 py-3 rounded-full hover:border-green-800 hover:text-green-800 transition" data-aos="fade-left">Lihat Semua Layanan</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($services as $service)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition group" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative h-48 overflow-hidden">
                    @if($service->image)
                        <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-full bg-green-100 flex items-center justify-center">
                            <span class="text-4xl text-green-800">📁</span>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 bg-yellow-500 text-green-950 text-xs font-bold px-3 py-1 rounded-full">{{ $service->category }}</span>
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-gray-900 mb-2 text-lg group-hover:text-green-800 transition">{{ $service->name }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $service->description }}</p>
                    <a href="{{ route('public.services.show', $service->id) }}" class="text-sm font-semibold text-green-800 hover:text-green-600">Selengkapnya →</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Berita Terbaru -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div data-aos="fade-up">
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Kabar & Informasi</div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900">Berita Terbaru BLUD</h2>
            </div>
            <a href="{{ route('public.news') }}" class="hidden md:block text-green-800 font-semibold hover:text-green-600" data-aos="fade-left">Lihat Semua Berita →</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($latestNews as $news)
            <article class="group cursor-pointer" onclick="window.location='{{ route('public.news.show', $news->slug) }}'" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="rounded-xl overflow-hidden mb-4 relative">
                    @if($news->image)
                        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full h-56 object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-56 bg-gray-200 flex items-center justify-center">
                            <span class="text-4xl text-gray-400">📰</span>
                        </div>
                    @endif
                    <span class="absolute top-4 left-4 bg-yellow-500 text-green-950 text-xs font-bold px-3 py-1 rounded-full">{{ $news->category ?? 'Informasi' }}</span>
                </div>
                <div class="text-xs text-gray-400 mb-2">{{ $news->published_at->format('d M Y') }}</div>
                <h3 class="font-semibold text-gray-900 mb-2 text-xl leading-snug group-hover:text-green-800 transition line-clamp-2">{{ $news->title }}</h3>
                <p class="text-sm text-gray-500 line-clamp-2">{{ $news->excerpt }}</p>
                <span class="text-sm font-semibold text-green-800 mt-3 inline-block">Baca Selengkapnya →</span>
            </article>
            @endforeach
        </div>
    </div>
</section>

<!-- Lokasi / Peta -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden flex flex-col lg:flex-row" data-aos="fade-up">
            <div class="p-10 lg:w-1/3 bg-green-950 text-white flex flex-col justify-between">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Kunjungi Kami</h3>
                    <p class="text-green-200 mb-8">Jl. Jendral A. Yani No. 98, Nagri Tengah, Kec. Purwakarta, Kabupaten Purwakarta, Jawa Barat 41111</p>
                </div>
                <a href="https://maps.google.com/?q=SMKN+2+Purwakarta" target="_blank" class="inline-flex items-center justify-center gap-2 bg-yellow-500 text-green-950 font-semibold px-6 py-3 rounded-lg hover:bg-yellow-400 transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    Buka di Google Maps
                </a>
            </div>
            <div class="lg:w-2/3 h-96 lg:h-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.455!2d107.411!3d-6.551!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69101e2b91c3f7%3A0x4038e5b7c1a7c951!2sSMK%20Negeri%202%20Purwakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</section>
@endsection