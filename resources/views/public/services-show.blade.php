@extends('layouts.public')

@section('title', $service->name . ' - BLUD SMKN 2 Purwakarta')

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-green-800">Beranda</a>
            <span>/</span>
            <a href="{{ route('public.services') }}" class="hover:text-green-800">Layanan</a>
            <span>/</span>
            <span class="text-gray-900 font-medium">{{ $service->name }}</span>
        </div>
    </div>
</section>

<!-- Service Detail -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Image -->
            <div class="relative">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full h-[500px] object-cover rounded-2xl shadow-lg">
                @else
                    <div class="w-full h-[500px] bg-gray-100 rounded-2xl flex items-center justify-center">
                        <span class="text-6xl text-gray-300">🛠️</span>
                    </div>
                @endif
            </div>

            <!-- Detail -->
            <div>
                <div class="flex gap-3 mb-4">
                    <span class="bg-yellow-500 text-green-950 text-xs font-bold px-3 py-1 rounded-full">{{ $service->category }}</span>
                    <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">
                        {{ $service->is_online ? 'Online' : 'Offline' }}
                    </span>
                </div>

                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6">{{ $service->name }}</h1>

                <div class="prose prose-lg max-w-none mb-8">
                    <p class="text-gray-600 leading-relaxed">{{ $service->description }}</p>
                </div>

                @if($service->requirements)
                    <div class="bg-gray-50 rounded-xl p-6 mb-8">
                        <h3 class="font-semibold text-gray-900 mb-2">Syarat & Ketentuan</h3>
                        <p class="text-gray-600">{{ $service->requirements }}</p>
                    </div>
                @endif

                <div class="flex gap-4">
                    <a href="{{ route('public.contact') }}" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition text-center">
                        Pesan Layanan Ini
                    </a>
                    <a href="{{ route('public.services') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Services -->
@if($relatedServices->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Layanan Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedServices as $related)
            <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition group cursor-pointer" onclick="window.location='{{ route('public.services.show', $related->id) }}'">
                <div class="h-48 overflow-hidden">
                    @if($related->image)
                        <img src="{{ asset('storage/'.$related->image) }}" alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <span class="text-4xl text-gray-300">🛠️</span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-gray-900 mb-2 group-hover:text-green-800 transition">{{ $related->name }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2">{{ $related->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection