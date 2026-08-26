@extends('layouts.admin')

@section('title', 'Detail Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="mb-6">
            <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-500 hover:text-green-800">← Kembali ke Daftar Berita</a>
        </div>

        <div class="mb-6">
            <span class="bg-yellow-100 text-yellow-800 text-xs font-bold px-3 py-1 rounded-full">{{ $news->category }}</span>
            <span class="text-sm text-gray-500 ml-3">{{ $news->created_at->format('d M Y') }}</span>
        </div>

        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ $news->title }}</h1>

        @if($news->image)
            <img src="{{ asset('storage/'.$news->image) }}" alt="{{ $news->title }}" class="w-full h-96 object-cover rounded-xl mb-6">
        @endif

        <div class="prose prose-lg max-w-none">
            {!! $news->content !!}
        </div>

        @if($news->tags)
            <div class="mt-6 flex flex-wrap gap-2">
                @foreach(explode(',', $news->tags) as $tag)
                    <span class="bg-gray-100 text-gray-700 text-xs font-semibold px-3 py-1 rounded-full">#{{ trim($tag) }}</span>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection