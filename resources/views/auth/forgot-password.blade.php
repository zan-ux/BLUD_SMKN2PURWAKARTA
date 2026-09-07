<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - BLUD SMKN 2 Purwakarta</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-gray-50">

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl shadow-xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            @php
                $profile = \App\Models\Profile::first();
            @endphp

            @if($profile && $profile->logo)
                <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-16 w-auto mx-auto mb-4">
            @else
                <div class="w-16 h-16 bg-yellow-400 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <span class="text-2xl font-bold text-white">B</span>
                </div>
            @endif

            <h2 class="text-2xl font-bold text-gray-900">Lupa Password?</h2>
            <p class="text-gray-500 mt-2 text-sm">Silakan hubungi admin untuk reset password akun Anda.</p>
        </div>

        <!-- Info Kontak Admin -->
        <div class="bg-gray-50 rounded-xl p-6 mb-6">
            <div class="flex items-start gap-4 mb-4">
                <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                <div>
                    <div class="font-semibold text-gray-900">Telepon / WhatsApp</div>
                    <p class="text-sm text-gray-500">{{ $profile->phone ?? '(0264) 200157' }}</p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <svg class="w-6 h-6 text-green-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                <div>
                    <div class="font-semibold text-gray-900">Email Admin</div>
                    <p class="text-sm text-gray-500">{{ $profile->email ?? 'info@smkn2purwakarta.sch.id' }}</p>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{ route('login') }}" class="text-sm text-green-800 font-semibold hover:text-green-600">← Kembali ke Login</a>
        </div>
    </div>
</div>

</body>
</html>