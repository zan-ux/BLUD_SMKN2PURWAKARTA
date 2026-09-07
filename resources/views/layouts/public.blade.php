<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'BLUD SMKN 2 Purwakarta')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        blud: {
                            dark: '#0F2E1D',
                            primary: '#14532D',
                            accent: '#EAB308',
                            brown: '#8B5E3C',
                        }
                    }
                }
            }
        }
    </script>
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @stack('styles')
</head>
<body class="font-sans bg-gray-50 text-gray-800 antialiased">

    <!-- Header -->
    @include('partials.public-header')

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @include('partials.public-footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Inisialisasi AOS
        AOS.init({
            duration: 800,           // Durasi animasi dalam milidetik
            easing: 'ease-in-out',   // Jenis easing
            once: true,              // Animasi hanya berjalan sekali
            offset: 50,              // Jarak dari viewport sebelum animasi dimulai
            delay: 0,                // Delay default sebelum animasi
        });
    </script>
    
    @stack('scripts')
</body>
</html>