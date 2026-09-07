@extends('layouts.public')

@section('title', 'Fasilitas - BLUD SMKN 2 Purwakarta')

@section('content')
<!-- Hero -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div data-aos="fade-up">
            <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Layanan BLUD</div>
        </div>
        <div class="flex flex-col lg:flex-row justify-between items-start lg:items-end gap-8">
            <div data-aos="fade-up" data-aos-delay="100">
                <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Fasilitas Publik<br>Unggulan</h1>
                <p class="text-gray-600 max-w-xl leading-relaxed">
                    SMKN 2 Purwakarta melalui tata kelola BLUD menyewakan berbagai fasilitas standar industri dan profesional untuk mendukung kegiatan masyarakat, instansi, maupun dunia usaha.
                </p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm flex items-center gap-8" data-aos="fade-up" data-aos-delay="200">
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-800">{{ $facilities->total() }}+</div>
                    <div class="text-sm text-gray-500">Fasilitas Utama</div>
                </div>
                <div class="border-l border-gray-200 pl-8">
                    <div class="font-semibold text-gray-900 mb-1">Pemesanan Mudah</div>
                    <div class="text-sm text-gray-500">Terbuka untuk Umum</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Facilities Grid -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($facilities as $facility)
            <div class="relative group rounded-2xl overflow-hidden h-72 cursor-pointer" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                @if($facility->image)
                    <img src="{{ asset('storage/'.$facility->image) }}" alt="{{ $facility->name }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition duration-300">
                @else
                    <div class="absolute inset-0 bg-green-100 flex items-center justify-center">
                        <span class="text-6xl text-green-300">🏢</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-green-950/90 via-green-950/20 to-transparent opacity-90"></div>
                <div class="absolute bottom-0 p-6 w-full">
                    <h3 class="text-xl font-bold text-white mb-1">{{ $facility->name }}</h3>
                    <div class="text-sm text-green-200">{{ $facility->category }}</div>
                </div>
                <span class="absolute top-4 right-4 bg-white/20 backdrop-blur text-white text-xs font-semibold px-3 py-1 rounded-full">{{ $facility->status_label }}</span>
            </div>
            @empty
            <div class="col-span-3 text-center py-20 text-gray-500" data-aos="fade-up">
                Belum ada fasilitas yang tersedia.
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Reservation -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-green-950 rounded-2xl p-10 lg:p-14 flex flex-col lg:flex-row justify-between items-center gap-8" data-aos="fade-up">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold text-white mb-4">Mulai Rencanakan Acara Anda</h2>
                <p class="text-green-200 leading-relaxed mb-6">
                    Dapatkan penawaran terbaik untuk penyewaan fasilitas kami. Tim layanan BLUD siap membantu menyesuaikan kebutuhan acara atau kegiatan bisnis Anda.
                </p>
                <div class="flex gap-4">
                    <div class="flex items-center gap-2 text-green-300 text-sm">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                        Layanan Cepat
                    </div>
                    <div class="flex items-center gap-2 text-green-300 text-sm">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        Harga Transparan
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl w-full lg:w-96">
                <h3 class="font-bold text-gray-900 mb-4">Hubungi Kami</h3>
                <div class="flex gap-4">
                    <a href="{{ route('public.contact') }}" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition text-center">
                        Kirim Pesan
                    </a>
                <div class="text-center text-sm text-gray-500">
                    Atau hubungi via WhatsApp<br>
                    <span class="font-semibold text-gray-700">0812-XXXX-XXXX</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection