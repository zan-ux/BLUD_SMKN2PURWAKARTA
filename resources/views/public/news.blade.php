@extends('layouts.public')

@section('title', 'Berita')

@section('content')
<!-- Hero -->
<section class="bg-white pt-16 pb-8">
    <div class="container mx-auto px-4">
        <div class="text-sm font-semibold text-green-800 uppercase tracking-wider mb-2">Sorotan Utama</div>
    </div>
</section>

<!-- Featured News -->
@if($featuredNews)
<section class="bg-white pb-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center bg-gray-50 rounded-2xl p-8 lg:p-12">
            <div>
                <div class="flex gap-3 mb-4">
                    <span class="bg-yellow-500 text-green-950 text-xs font-bold px-3 py-1 rounded-full">Sorotan Utama</span>
                    <span class="text-sm text-gray-500 pt-1">{{ $featuredNews->published_at->format('d M Y') }}</span>
                </div>
                <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $featuredNews->title }}</h1>
                <p class="text-gray-600 mb-8 leading-relaxed">{{ $featuredNews->excerpt }}</p>
                <a href="{{ route('public.news.show', $featuredNews->slug) }}" class="bg-green-900 text-white font-semibold px-8 py-3 rounded-full hover:bg-green-800 transition">
                    Baca Selengkapnya →
                </a>
            </div>
            <div class="relative h-96">
                @if($featuredNews->image)
                    <img src="{{ asset('storage/'.$featuredNews->image) }}" alt="{{ $featuredNews->title }}" class="w-full h-full object-cover rounded-2xl shadow-lg">
                @else
                    <div class="w-full h-full bg-gray-200 rounded-2xl flex items-center justify-center">
                        <span class="text-6xl text-gray-400">📰</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- Latest News Grid -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold text-gray-900 mb-2">Berita Terbaru</h2>
        <p class="text-gray-500 mb-12">Informasi dan kegiatan terkini seputar BLUD SMKN 2 Purwakarta</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($news as $item)
            <article class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg transition group cursor-pointer" onclick="window.location='{{ route('public.news.show', $item->slug) }}'">
                <div class="h-56 overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @else
                        <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                            <span class="text-4xl text-gray-300">📰</span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="text-xs text-gray-400 mb-3">{{ $item->published_at->format('d M Y') }}</div>
                    <h3 class="font-semibold text-gray-900 text-lg mb-3 group-hover:text-green-800 transition line-clamp-2">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $item->excerpt }}</p>
                    <span class="text-sm font-semibold text-green-800">Baca Selengkapnya →</span>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-20 text-gray-500">Belum ada berita.</div>
            @endforelse
        </div>
        
        <div class="mt-12 text-center">
            {{ $news->links() }}
        </div>
    </div>
</section>
@endsection