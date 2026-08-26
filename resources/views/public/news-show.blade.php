@extends('layouts.public')

@section('title', $news->title)

@section('content')
<!-- Breadcrumb -->
<section class="bg-gray-50 py-8">
    <div class="container mx-auto px-4">
        <div class="flex items-center gap-2 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-green-800">Beranda</a>
            <span>/</span>
            <a href="{{ route('public.news') }}" class="hover:text-green-800">Berita</a>
            <span>/</span>
            <span class="text-gray-900 font-medium line-clamp-1">{{ $news->title }}</span>
        </div>
    </div>
</section>

<!-- News Content -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-4xl">
        <!-- Header -->
        <div class="mb-8">
            <div class="flex gap-3 mb-4">
                <span class="bg-yellow-500 text-green-950 text-xs font-bold px-3 py-1 rounded-full">{{ $news->category ?? 'Informasi' }}</span>
                <span class="text-sm text-gray-500 pt-1">{{ $news->published_at->format('d M Y') }}</span>
            </div>
            <h1 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-6 leading-tight">{{ $news->title }}</h1>
            <div class="flex items-center gap-3 text-sm text-gray-500">
                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-800 font-bold">
                    {{ substr($news->author->name ?? 'A', 0, 1) }}
                </div>
                <div>
                    <div class="font-semibold text-gray-900">{{ $news->author->name ?? 'Admin' }}</div>
                    <div>Penulis</div>
                </div>
            </div>
        </div>
        
        <!-- Image -->
        @if($news->image)
        <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full h-[400px] object-cover rounded-2xl shadow-lg mb-10">
        @endif
        
        <!-- Content -->
        <div class="prose prose-lg prose-green max-w-none">
            {!! $news->content !!}
        </div>
        
        <!-- Gallery -->
        @if($news->gallery->count() > 0)
        <div class="mt-10">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Galeri</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($news->gallery as $image)
                <div class="rounded-xl overflow-hidden cursor-pointer">
                    <img src="{{ asset('storage/'.$image->image) }}" alt="{{ $image->caption }}" class="w-full h-48 object-cover hover:scale-110 transition duration-300">
                </div>
                @endforeach
            </div>
        </div>
        @endif
        
        <!-- Tags -->
        @if($news->tags)
        <div class="mt-10 flex flex-wrap gap-2">
            @foreach($news->tags_array as $tag)
            <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">#{{ $tag }}</span>
            @endforeach
        </div>
        @endif
    </div>
</section>

<!-- Related News -->
@if($relatedNews->count() > 0)
<section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-8">Berita Terkait</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedNews as $item)
            <article class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-lg transition group cursor-pointer" onclick="window.location='{{ route('public.news.show', $item->slug) }}'">
                <div class="h-40 overflow-hidden">
                    @if($item->image)
                        <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300">
                    @endif
                </div>
                <div class="p-4">
                    <div class="text-xs text-gray-400 mb-2">{{ $item->published_at->format('d M Y') }}</div>
                    <h3 class="font-semibold text-gray-900 line-clamp-2 group-hover:text-green-800 transition">{{ $item->title }}</h3>
                </div>
            </article>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection