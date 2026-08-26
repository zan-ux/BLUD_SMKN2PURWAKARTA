@extends('layouts.public')

@section('title', 'Profil BLUD')

@section('content')
<!-- Hero Small -->
<section class="bg-green-950 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <div class="inline-flex items-center gap-2 bg-green-900/50 px-4 py-2 rounded-full mb-4 text-xs font-semibold uppercase tracking-wider">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path></svg>
            Profil BLUD
        </div>
        <h1 class="text-3xl lg:text-4xl font-bold">Profil {{ $profile->institution_name ?? 'BLUD' }}</h1>
    </div>
</section>

<!-- Sejarah -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Sejarah Institusi</div>
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Melangkah Maju Sejak {{ $profile->established_year ?? '2005' }}</h2>
                <div class="prose prose-green max-w-none text-gray-600 leading-relaxed">
                    <p class="mb-4">
                        {{ $profile->description ?? 'Belum ada deskripsi institusi.' }}
                    </p>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-4 -right-4 w-full h-full bg-green-100 rounded-2xl"></div>
                <div class="relative rounded-2xl shadow-xl w-full h-[400px] overflow-hidden">
                    @if($profile->foto_sejarah)
                        <img src="{{ asset('storage/'.$profile->foto_sejarah) }}" alt="Sejarah" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-green-100 flex items-center justify-center">
                            <span class="text-6xl text-green-300">🏫</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Visi & Misi -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Visi -->
            <div class="bg-green-950 text-white rounded-2xl p-10 flex flex-col justify-between h-[400px]">
                <div class="text-sm font-semibold text-yellow-400 uppercase tracking-wider mb-4">Visi Kami</div>
                <div class="text-2xl font-bold leading-relaxed mb-8">
                    "{{ $profile->vision ?? 'Belum ada visi.' }}"
                </div>
                <div class="flex justify-end">
                    <div class="w-12 h-12 bg-green-900 rounded-full flex items-center justify-center text-green-400">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    </div>
                </div>
            </div>
            
            <!-- Misi -->
            <div class="bg-white rounded-2xl p-10">
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Misi Institusi</div>
                <div class="space-y-6">
                    @if($profile->mission)
                        @foreach(explode("\n", $profile->mission) as $index => $misi)
                            <div class="flex gap-4">
                                <div class="flex-shrink-0 w-10 h-10 bg-green-900 rounded-full flex items-center justify-center text-white font-bold">{{ $index + 1 }}</div>
                                <p class="text-gray-700 leading-relaxed pt-2">{{ $misi }}</p>
                            </div>
                        @endforeach
                    @else
                        <p class="text-gray-500">Belum ada misi institusi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Sambutan Kepala Sekolah -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-2xl p-8 lg:p-12 grid grid-cols-1 lg:grid-cols-3 gap-8 items-center">
            <div class="lg:col-span-1">
                <div class="w-full h-72 rounded-xl overflow-hidden shadow-lg">
                    @if($profile->foto_sambutan)
                        <img src="{{ asset('storage/'.$profile->foto_sambutan) }}" alt="Kepala Sekolah" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-green-100 flex items-center justify-center">
                            <span class="text-6xl text-green-300">👨‍🏫</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:col-span-2">
                <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-4">Kepemimpinan</div>
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Sambutan Kepala Sekolah</h3>
                <blockquote class="relative pl-6 border-l-4 border-green-800 mb-6">
                    <p class="text-gray-600 italic leading-relaxed">
                        "{{ $profile->sambutan ?? 'Belum ada sambutan kepala sekolah.' }}"
                    </p>
                </blockquote>
                <div class="font-semibold text-gray-900">{{ $profile->nama_kepala ?? 'Nama Kepala Sekolah' }}</div>
                <div class="text-sm text-gray-500">Kepala Sekolah</div>
            </div>
        </div>
    </div>
</section>

<!-- Legalitas & Akreditasi -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Akreditasi -->
            <div class="bg-white p-10 rounded-2xl">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Akreditasi Institusi</h3>
                </div>
                <div class="bg-green-50 p-6 rounded-xl flex items-center gap-6">
                    <div class="w-20 h-20 bg-green-900 rounded-full flex items-center justify-center text-yellow-400 text-3xl font-extrabold">A</div>
                    <div>
                        <div class="font-semibold text-green-900 mb-2">Terakreditasi Unggul</div>
                        <p class="text-sm text-gray-600">Institusi telah mendapatkan predikat Akreditasi A (Unggul) dari BAN-S/M.</p>
                    </div>
                </div>
            </div>
            
            <!-- Legalitas -->
            <div class="bg-white p-10 rounded-2xl">
                <div class="flex items-center gap-3 mb-8">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900">Legalitas BLUD</h3>
                </div>
                <div class="space-y-4">
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 mt-1 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-green-800 rounded-full"></div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">SK Gubernur Jawa Barat</div>
                            <p class="text-sm text-gray-500 mt-1">{{ $profile->legal_basis ?? 'Belum ada data legalitas.' }}</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex-shrink-0 mt-1 w-6 h-6 bg-green-100 rounded-full flex items-center justify-center">
                            <div class="w-2 h-2 bg-green-800 rounded-full"></div>
                        </div>
                        <div>
                            <div class="font-semibold text-gray-900">Izin Operasional</div>
                            <p class="text-sm text-gray-500 mt-1">Terdaftar secara resmi di Kementerian Pendidikan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak Kami -->
<section class="py-20 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-green-950 rounded-2xl p-10 lg:p-14 flex flex-col lg:flex-row justify-between items-center gap-8">
            <div class="max-w-xl">
                <h2 class="text-3xl font-bold text-white mb-4">Hubungi Kami</h2>
                <p class="text-green-200 leading-relaxed mb-6">
                    Kami siap membantu Anda. Silakan kunjungi atau hubungi kami di alamat berikut.
                </p>
                <div class="space-y-3">
                    <div class="flex items-center gap-3 text-green-200">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ $profile->full_address ?? 'Alamat belum diisi' }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-green-200">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>{{ $profile->phone ?? 'Telepon belum diisi' }}</span>
                    </div>
                    <div class="flex items-center gap-3 text-green-200">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>{{ $profile->email ?? 'Email belum diisi' }}</span>
                    </div>
                </div>
            </div>
            <a href="{{ route('public.contact') }}" class="bg-yellow-500 hover:bg-yellow-400 text-green-950 font-semibold px-8 py-4 rounded-full transition flex-shrink-0">
                Kirim Pesan →
            </a>
        </div>
    </div>
</section>
@endsection