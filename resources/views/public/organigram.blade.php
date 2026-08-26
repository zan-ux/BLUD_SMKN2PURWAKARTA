@extends('layouts.public')

@section('title', 'Organigram - BLUD SMKN 2 Purwakarta')

@section('content')
<!-- Hero -->
<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 bg-white px-4 py-2 rounded-full shadow-sm mb-4 text-xs font-semibold text-green-800 uppercase tracking-wider">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            Struktur Organisasi
        </div>
        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">Organigram BLUD</h1>
        <p class="text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Susunan kepengurusan Badan Layanan Umum Daerah (BLUD) SMKN 2 Purwakarta, memastikan tata kelola yang profesional, transparan, dan akuntabel.
        </p>
    </div>
</section>

<!-- Struktur Chart -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        @if($organigrams->count() > 0)
            <!-- Container Utama dengan Flex Column dan items-center untuk memastikan semua elemen di tengah -->
            <div class="flex flex-col items-center w-full">
                
                <!-- ROOT (Kepala Sekolah) - Pastikan berada di tengah -->
                @foreach($organigrams->where('parent_id', null) as $top)
                <div class="flex flex-col items-center mb-16">
                    <div class="bg-white border-2 border-green-200 rounded-2xl p-8 shadow-lg w-80 text-center transform transition hover:scale-105">
                        <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-green-100 flex items-center justify-center overflow-hidden">
                            @if($top->photo)
                                <img src="{{ asset('storage/'.$top->photo) }}" alt="{{ $top->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-4xl font-bold text-green-800">{{ substr($top->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <div class="font-bold text-gray-900 text-lg">{{ $top->name }}</div>
                        <div class="text-sm text-gray-500">{{ $top->position }}</div>
                    </div>
                    
                    <!-- Garis Penghubung Vertikal -->
                    <div class="w-px h-12 bg-gray-300"></div>
                </div>
                @endforeach

                <!-- CHILDREN (Bawahan) - Disusun Sejajar dan Rapi di Tengah -->
                <div class="flex flex-wrap justify-center gap-8 w-full max-w-5xl">
                    @foreach($organigrams->where('parent_id', '!=', null) as $child)
                    <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-md w-64 text-center transform transition hover:scale-105">
                        <div class="w-16 h-16 mx-auto mb-3 rounded-full bg-green-50 flex items-center justify-center overflow-hidden">
                            @if($child->photo)
                                <img src="{{ asset('storage/'.$child->photo) }}" alt="{{ $child->name }}" class="w-full h-full object-cover">
                            @else
                                <span class="text-2xl font-bold text-green-800">{{ substr($child->name, 0, 1) }}</span>
                            @endif
                        </div>
                        <div class="font-semibold text-gray-900">{{ $child->name }}</div>
                        <div class="text-sm text-green-800">{{ $child->position }}</div>
                    </div>
                    @endforeach
                </div>

            </div>
        @else
            <div class="text-center py-20 text-gray-500">Belum ada struktur organisasi.</div>
        @endif
    </div>
</section>

<!-- Tugas & Fungsi -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Tugas & Fungsi</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-8">Tugas & Fungsi BLUD</h2>
                <p class="text-gray-600 leading-relaxed mb-10">
                    Struktur organisasi BLUD SMKN 2 Purwakarta dirancang untuk mendukung kelancaran operasional sekaligus menjaga kepatuhan terhadap peraturan pengelolaan keuangan daerah. Setiap fungsi memiliki peran vital dalam mengembangkan potensi vokasi.
                </p>
                
                <div class="space-y-6">
                    @foreach($organigrams as $item)
                    <div class="bg-white p-6 rounded-xl shadow-sm flex gap-4">
                        <div class="flex-shrink-0">
                            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-800">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900 mb-2">{{ $item->position }}</h4>
                            <p class="text-sm text-gray-600 leading-relaxed">{{ $item->description ?? 'Bertanggung jawab atas pelaksanaan tugas sesuai bidangnya.' }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            
            <!-- Image Side -->
            <div class="relative">
                <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" alt="Gedung" class="rounded-2xl shadow-xl w-full h-[500px] object-cover">
                <div class="absolute bottom-8 left-8 bg-white/90 backdrop-blur p-6 rounded-2xl shadow-lg max-w-xs">
                    <div class="text-xs font-bold text-green-800 uppercase tracking-wider mb-2">Sinergi</div>
                    <p class="font-semibold text-gray-900 leading-snug">Membangun ekosistem vokasi yang mandiri.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection