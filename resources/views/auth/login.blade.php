<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - BLUD SMKN 2 Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-white">

<div class="min-h-screen flex">
    <!-- Left Side (Image) -->
    <div class="hidden lg:block lg:w-1/2 relative bg-green-950">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80" class="absolute inset-0 w-full h-full object-cover opacity-30">
        <div class="relative z-10 flex flex-col justify-center h-full px-20">
            @php
                $profile = \App\Models\Profile::first();
            @endphp

            <div class="flex items-center gap-3 mb-8">
                @if($profile && $profile->logo)
                    <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-12 w-auto">
                @else
                    <div class="w-12 h-12 bg-yellow-400 rounded-xl flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">B</span>
                    </div>
                @endif
                <span class="font-bold text-white text-xl">{{ $profile->institution_name ?? 'BLUD Vokasi' }}</span>
            </div>
            <h1 class="text-4xl font-extrabold text-white mb-6 leading-tight">Membangun<br>Masa Depan.</h1>
            <p class="text-green-200 max-w-sm leading-relaxed">
                Akses layanan publik, administrasi siswa, dan pantau perkembangan vokasional dalam satu portal terpadu.
            </p>
        </div>
    </div>

    <!-- Right Side (Form) -->
    <div class="w-full lg:w-1/2 flex items-center justify-center px-6 py-12">
        <div class="w-full max-w-md">
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Selamat Datang Kembali</h2>
            <p class="text-gray-500 mb-8">Silahkan masuk menggunakan kredensial Anda.</p>

            <!-- Tabs -->
            <div class="flex gap-2 mb-8 bg-gray-100 p-1 rounded-lg">
                <button onclick="showLoginForm('public')" id="tab-public" class="flex-1 py-2 rounded-md bg-white shadow-sm text-gray-900 font-semibold text-sm transition">Peserta Didik / Umum</button>
                <button onclick="showLoginForm('admin')" id="tab-admin" class="flex-1 py-2 rounded-md text-gray-500 font-semibold text-sm hover:text-gray-900 transition">Administrator</button>
            </div>

            <!-- Public Login Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6" id="public-login-form">
                @csrf
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email atau ID Pengguna</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="Masukkan email atau ID">
                    </div>
                    @error('email')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="text-sm font-medium text-gray-700">Kata Sandi</label>
                        <a href="{{ route('password.request') }}" class="text-sm text-green-800 hover:text-green-600">Lupa Password?</a>
                    </div>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input type="password" name="password" class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="Masukkan kata sandi">
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600" onclick="togglePassword()">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </button>
                    </div>
                    @error('password')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="w-full bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition flex items-center justify-center gap-2">
                    Masuk ke Sistem
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </form>

            <!-- Admin Login Form (Hidden by default) -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6 hidden" id="admin-login-form">
                @csrf
                <input type="hidden" name="admin_login" value="1">
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Admin</label>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <input type="email" name="email" class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="admin@blud.com">
                    </div>
                </div>
                
                <div>
                    <div class="flex justify-between mb-2">
                        <label class="text-sm font-medium text-gray-700">Kata Sandi Admin</label>
                        <a href="{{ route('password.request') }}" class="text-sm text-green-800 hover:text-green-600">Lupa Password?</a>
                    </div>
                    <div class="relative">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                        <input type="password" name="password" class="w-full pl-10 pr-10 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800" placeholder="Masukkan kata sandi admin">
                    </div>
                </div>
                
                <button type="submit" class="w-full bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition flex items-center justify-center gap-2">
                    Masuk sebagai Admin
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </button>
            </form>

<!-- Social Login -->
<div class="mt-8 flex items-center gap-4">
    <div class="flex-1 h-px bg-gray-200"></div>
    <span class="text-sm text-gray-500">atau masuk dengan</span>
    <div class="flex-1 h-px bg-gray-200"></div>
</div>

<!-- Tombol Google di Tengah -->
<div class="mt-6 flex justify-center">
    <a href="{{ route('auth.google') }}" class="flex items-center justify-center gap-2 bg-white border border-gray-200 text-gray-700 py-3 px-8 rounded-lg hover:bg-gray-50 transition text-sm font-medium">
        <svg class="w-5 h-5" viewBox="0 0 24 24"><path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
        Masuk dengan Google
    </a>
</div>
            
            <p class="mt-8 text-center text-sm text-gray-500">
                Belum memiliki akun? <a href="{{ route('register') }}" class="text-green-800 font-semibold hover:text-green-600">Daftar Sekarang</a>
            </p>
            
            <div class="mt-4 flex items-center justify-center gap-2 text-xs text-gray-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Koneksi Terenkripsi & Aman
            </div>
        </div>
    </div>
</div>

<script>
    function showLoginForm(type) {
        const publicForm = document.getElementById('public-login-form');
        const adminForm = document.getElementById('admin-login-form');
        const tabPublic = document.getElementById('tab-public');
        const tabAdmin = document.getElementById('tab-admin');

        if (type === 'admin') {
            publicForm.classList.add('hidden');
            adminForm.classList.remove('hidden');
            tabAdmin.classList.add('bg-white', 'shadow-sm', 'text-gray-900');
            tabAdmin.classList.remove('text-gray-500');
            tabPublic.classList.remove('bg-white', 'shadow-sm', 'text-gray-900');
            tabPublic.classList.add('text-gray-500');
        } else {
            adminForm.classList.add('hidden');
            publicForm.classList.remove('hidden');
            tabPublic.classList.add('bg-white', 'shadow-sm', 'text-gray-900');
            tabPublic.classList.remove('text-gray-500');
            tabAdmin.classList.remove('bg-white', 'shadow-sm', 'text-gray-900');
            tabAdmin.classList.add('text-gray-500');
        }
    }

    function togglePassword() {
        const input = document.querySelector('input[name="password"]');
        input.type = input.type === 'password' ? 'text' : 'password';
    }
</script>
</body>
</html>