@extends('layouts.public')

@section('title', 'Petunjuk Penggunaan - BLUD SMKN 2 Purwakarta')

@section('content')
<!-- Hero Section -->
<section class="bg-green-950 text-white py-16">
    <div class="container mx-auto px-4 text-center">
        <div data-aos="fade-up">
            <div class="inline-flex items-center gap-2 bg-green-900/50 px-4 py-2 rounded-full mb-4 text-xs font-semibold uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                Panduan Pengguna
            </div>
        </div>
        <div data-aos="fade-up" data-aos-delay="100">
            <h1 class="text-3xl lg:text-4xl font-bold">Petunjuk Penggunaan Website</h1>
        </div>
        <div data-aos="fade-up" data-aos-delay="200">
            <p class="text-green-200 max-w-2xl mx-auto mt-4">
                Panduan lengkap untuk menggunakan fitur-fitur yang tersedia di website BLUD SMKN 2 Purwakarta.
            </p>
        </div>
    </div>
</section>

<!-- Daftar Isi -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-gray-50 rounded-2xl p-8" data-aos="fade-up">
            <h2 class="text-2xl font-bold text-gray-900 mb-6">Daftar Isi</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="#beranda" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Beranda</span>
                </a>
                <a href="#profil" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Profil BLUD</span>
                </a>
                <a href="#layanan" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Layanan</span>
                </a>
                <a href="#fasilitas" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Fasilitas</span>
                </a>
                <a href="#berita" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Berita</span>
                </a>
                <a href="#organigram" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Organigram</span>
                </a>
                <a href="#login" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Login & Registrasi</span>
                </a>
                <a href="#kontak" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">Kontak</span>
                </a>
                <a href="#faq" class="flex items-center gap-3 p-4 bg-white rounded-xl shadow-sm hover:shadow-md transition">
                    <span class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </span>
                    <span class="font-semibold text-gray-900">FAQ</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Beranda -->
<section id="beranda" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Beranda</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Beranda</strong> adalah halaman utama yang menampilkan ringkasan informasi tentang BLUD SMKN 2 Purwakarta.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Fitur di Halaman Beranda:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Hero Section</strong> - Menampilkan slogan dan ajakan untuk menjelajahi layanan</li>
                        <li><strong>Tentang BLUD</strong> - Ringkasan singkat tentang institusi</li>
                        <li><strong>Layanan Unggulan</strong> - Menampilkan beberapa layanan populer</li>
                        <li><strong>Berita Terbaru</strong> - Informasi dan pengumuman terkini</li>
                        <li><strong>Lokasi / Peta</strong> - Petunjuk arah ke lokasi sekolah</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Profil BLUD -->
<section id="profil" class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Profil BLUD</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Profil BLUD</strong> menampilkan informasi lengkap tentang institusi.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Informasi yang Tersedia:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li><strong>Sejarah Institusi</strong> - Latar belakang berdirinya sekolah</li>
                        <li><strong>Visi & Misi</strong> - Tujuan dan cita-cita institusi</li>
                        <li><strong>Sambutan Kepala Sekolah</strong> - Pesan dari pimpinan</li>
                        <li><strong>Akreditasi & Legalitas</strong> - Status dan legalitas institusi</li>
                        <li><strong>Kontak Kami</strong> - Alamat, telepon, dan email</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Layanan -->
<section id="layanan" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Layanan</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Layanan</strong> menampilkan berbagai produk dan jasa yang ditawarkan oleh BLUD.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Cara Menggunakan:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Buka halaman <strong>Layanan</strong> melalui menu navigasi</li>
                        <li>Pilih layanan yang ingin Anda gunakan</li>
                        <li>Klik <strong>Selengkapnya</strong> untuk melihat detail</li>
                        <li>Hubungi kami melalui halaman <strong>Kontak</strong> untuk pemesanan</li>
                    </ol>
                </div>
                
                <div class="bg-yellow-50 p-4 rounded-xl mt-4">
                    <h3 class="font-semibold text-yellow-900 mb-2">Tips:</h3>
                    <p class="text-sm">Beberapa layanan dapat dipesan online, sedangkan lainnya perlu menghubungi admin secara langsung.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fasilitas -->
<section id="fasilitas" class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Fasilitas</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Fasilitas</strong> menampilkan berbagai sarana dan prasarana yang dapat disewa atau digunakan.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Cara Menggunakan:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Buka halaman <strong>Fasilitas</strong> melalui menu navigasi</li>
                        <li>Pilih fasilitas yang ingin Anda gunakan</li>
                        <li>Perhatikan <strong>status ketersediaan</strong> (tersedia, perawatan, tidak tersedia)</li>
                        <li>Hubungi admin untuk reservasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Berita -->
<section id="berita" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Berita</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Berita</strong> menampilkan informasi terbaru, pengumuman, dan kegiatan.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Cara Menggunakan:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Buka halaman <strong>Berita</strong> melalui menu navigasi</li>
                        <li>Klik judul berita untuk membaca selengkapnya</li>
                        <li>Gunakan navigasi halaman untuk melihat berita lainnya</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Organigram -->
<section id="organigram" class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Organigram</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Organigram</strong> menampilkan struktur organisasi dan kepengurusan BLUD.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Informasi yang Tersedia:</h3>
                    <ul class="list-disc list-inside space-y-2">
                        <li>Struktur kepengurusan dari pimpinan hingga staf</li>
                        <li>Tugas dan fungsi setiap jabatan</li>
                        <li>Kontak personel yang dapat dihubungi</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Login & Registrasi -->
<section id="login" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Login & Registrasi</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Login</strong> digunakan untuk mengakses fitur khusus pengguna terdaftar.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Cara Registrasi:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Klik tombol <strong>Daftar</strong> di pojok kanan atas</li>
                        <li>Isi formulir pendaftaran (nama, email, password)</li>
                        <li>Klik <strong>Create Account</strong></li>
                        <li>Anda akan diarahkan ke halaman utama</li>
                    </ol>
                </div>
                
                <div class="bg-blue-50 p-4 rounded-xl mt-4">
                    <h3 class="font-semibold text-blue-900 mb-2">Cara Login:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Klik tombol <strong>Masuk</strong> di pojok kanan atas</li>
                        <li>Masukkan email dan password</li>
                        <li>Klik <strong>Masuk ke Sistem</strong></li>
                    </ol>
                </div>
                
                <div class="bg-yellow-50 p-4 rounded-xl mt-4">
                    <h3 class="font-semibold text-yellow-900 mb-2">Login dengan Google:</h3>
                    <p class="text-sm">Anda juga bisa login menggunakan akun Google. Klik tombol <strong>Masuk dengan Google</strong> dan ikuti instruksinya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Kontak -->
<section id="kontak" class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm border border-gray-100" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">Kontak</h2>
            </div>
            
            <div class="space-y-4 text-gray-600">
                <p><strong>Kontak</strong> digunakan untuk mengirim pesan atau pertanyaan kepada admin.</p>
                
                <div class="bg-green-50 p-4 rounded-xl">
                    <h3 class="font-semibold text-green-900 mb-2">Cara Menggunakan:</h3>
                    <ol class="list-decimal list-inside space-y-2">
                        <li>Buka halaman <strong>Kontak</strong> melalui menu navigasi</li>
                        <li>Isi formulir (nama, email, subjek, pesan)</li>
                        <li>Klik <strong>Kirim Pesan</strong></li>
                        <li>Admin akan merespon melalui email atau telepon</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section id="faq" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl p-8 lg:p-12 shadow-sm" data-aos="fade-up">
            <div class="flex items-center gap-4 mb-6">
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-900">FAQ (Pertanyaan yang Sering Diajukan)</h2>
            </div>
            
            <div class="space-y-4">
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara memesan layanan?</h3>
                    <p class="text-sm text-gray-600">Anda dapat menghubungi admin melalui halaman Kontak atau datang langsung ke sekolah.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Apakah harus registrasi untuk melihat layanan?</h3>
                    <p class="text-sm text-gray-600">Tidak, semua informasi dapat dilihat tanpa registrasi. Registrasi diperlukan untuk fitur tertentu seperti pemesanan online.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara reset password?</h3>
                    <p class="text-sm text-gray-600">Hubungi admin melalui telepon atau email untuk reset password.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Apakah fasilitas bisa disewa?</h3>
                    <p class="text-sm text-gray-600">Ya, beberapa fasilitas dapat disewa. Silakan lihat status ketersediaan di halaman Fasilitas.</p>
                </div>
                
                <div class="bg-gray-50 rounded-xl p-4">
                    <h3 class="font-semibold text-gray-900 mb-2">Bagaimana cara menghubungi sekolah?</h3>
                    <p class="text-sm text-gray-600">Lihat halaman Kontak untuk informasi alamat, telepon, dan email.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="py-20 bg-green-950">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-white mb-4">Masih Butuh Bantuan?</h2>
            <p class="text-green-200 mb-8">Jika Anda memiliki pertanyaan lain, jangan ragu untuk menghubungi kami.</p>
            <a href="{{ route('public.contact') }}" class="bg-yellow-500 hover:bg-yellow-400 text-green-950 font-semibold px-8 py-3 rounded-full transition">
                Hubungi Kami
            </a>
        </div>
    </div>
</section>
@endsection