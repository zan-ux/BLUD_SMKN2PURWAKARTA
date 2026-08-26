@php
    $profile = \App\Models\Profile::first();
@endphp

<footer class="bg-green-950 text-white mt-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
<!-- Brand -->
<div>
    <div class="flex items-center gap-3 mb-6">
    @php
        $profile = \App\Models\Profile::first();
    @endphp

    @if($profile && $profile->logo)
        <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="h-10 w-auto">
    @else
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10 w-auto">
    @endif

    <div>
        <span class="font-bold block text-sm">{{ $profile->institution_name ?? 'BLUD' }}</span>
        <span class="text-xs text-gray-300">{{ $profile->city ?? '' }}</span>
    </div>
</div>
</div>
            <!-- Contact -->
            <div>
                <h4 class="font-semibold mb-6 text-sm uppercase tracking-wider">Kontak Kami</h4>
                <ul class="space-y-4 text-sm text-gray-300">
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-yellow-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>{{ $profile->address ?? 'Alamat belum diisi' }}, {{ $profile->city ?? '' }}, {{ $profile->province ?? '' }} {{ $profile->postal_code ?? '' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                        <span>{{ $profile->phone ?? 'Telepon belum diisi' }}</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>{{ $profile->email ?? 'Email belum diisi' }}</span>
                    </li>
                </ul>
            </div>

            <!-- Quick Links -->
            <div>
                <h4 class="font-semibold mb-6 text-sm uppercase tracking-wider">Tautan Cepat</h4>
                <ul class="space-y-3 text-sm text-gray-300">
                    <li><a href="{{ route('public.profile') }}" class="hover:text-yellow-400 transition">Tentang Kami</a></li>
                    <li><a href="{{ route('public.services') }}" class="hover:text-yellow-400 transition">Layanan</a></li>
                    <li><a href="{{ route('public.facilities') }}" class="hover:text-yellow-400 transition">Fasilitas</a></li>
                    <li><a href="{{ route('public.contact') }}" class="hover:text-yellow-400 transition">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="bg-green-950 border-t border-green-900 py-6">
        <div class="container mx-auto px-4 text-center text-sm text-gray-400">
            &copy; {{ date('Y') }} {{ $profile->institution_name ?? 'BLUD' }}. Seluruh Hak Cipta Dilindungi.
        </div>
    </div>
</footer>