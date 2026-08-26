@extends('layouts.public')

@section('title', 'Layanan - BLUD SMKN 2 Purwakarta')

@section('content')
<!-- Hero -->
<section class="bg-gradient-to-r from-green-950 to-green-900 text-white py-20">
    <div class="container mx-auto px-4">
        <div class="text-sm font-semibold text-yellow-400 uppercase tracking-wider mb-4">Portofolio Layanan</div>
        <h1 class="text-4xl lg:text-5xl font-bold mb-6">Solusi Profesional Berbasis Vokasi</h1>
        <p class="text-lg text-green-100 max-w-2xl leading-relaxed">
            Badan Layanan Umum Daerah (BLUD) SMKN 2 Purwakarta menghadirkan produk dan layanan berkualitas tinggi yang dikelola secara profesional, mandiri, dan berorientasi pada kepuasan masyarakat.
        </p>
        
        <div class="mt-8 flex gap-8">
            <div class="bg-white/10 backdrop-blur px-6 py-4 rounded-xl">
                <div class="text-3xl font-bold">{{ $services->total() }}+</div>
                <div class="text-sm text-green-200">Pilar Layanan</div>
            </div>
            <div class="bg-white/10 backdrop-blur px-6 py-4 rounded-xl">
                <div class="text-3xl font-bold">100%</div>
                <div class="text-sm text-green-200">Dukungan Siswa</div>
            </div>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <div class="bg-white border border-gray-100 rounded-2xl overflow-hidden hover:shadow-xl transition group">
                <div class="h-56 overflow-hidden bg-gray-50">
                    @if($service->image)
                        <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-full flex items-center justify-center">
                            <span class="text-6xl text-green-200">🛠️</span>
                        </div>
                    @endif
                </div>
                <div class="p-8">
                    <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-green-800 transition">{{ $service->name }}</h3>
                    <p class="text-gray-500 text-sm leading-relaxed mb-6 line-clamp-3">{{ $service->description }}</p>
                    
                    <div class="flex items-center justify-between">
                        <div class="text-sm font-semibold text-green-800">
                        </div>
                        <a href="{{ route('public.services.show', $service->id) }}" class="inline-flex items-center gap-2 text-sm font-semibold text-gray-700 hover:text-green-800 transition">
                            Selengkapnya
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 text-gray-500">
                Belum ada layanan yang tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 bg-green-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-green-900 rounded-2xl p-10 lg:p-14 flex flex-col lg:flex-row items-center justify-between gap-8">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold text-white mb-4">Butuh Layanan Kustom?</h2>
                <p class="text-green-200 leading-relaxed">
                    Tim BLUD SMKN 2 Purwakarta siap berdiskusi untuk merancang solusi produk atau pelatihan yang sesuai dengan kebutuhan spesifik instansi atau perusahaan Anda.
                </p>
            </div>
            <a href="{{ route('public.contact') }}" class="bg-yellow-500 hover:bg-yellow-400 text-green-950 font-semibold px-8 py-4 rounded-full transition flex-shrink-0">
                Hubungi Kami →
            </a>
        </div>
    </div>
</section>
@endsection