@extends('layouts.admin')

@section('title', 'Manajemen Home')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Home</h1>
        <p class="text-gray-500">Kelola gambar dan konten halaman utama.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($sections as $section)
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="font-semibold text-gray-900">{{ ucfirst(str_replace('_', ' ', $section->key)) }}</h3>
                <a href="{{ route('admin.home-sections.edit', $section->id) }}" class="text-sm text-green-800 hover:text-green-600">Edit →</a>
            </div>
            
            <div class="mb-4">
                @if($section->image)
                    <img src="{{ asset('storage/'.$section->image) }}" alt="{{ $section->key }}" class="w-full h-40 object-cover rounded-lg">
                @else
                    <div class="w-full h-40 bg-gray-100 rounded-lg flex items-center justify-center">
                        <span class="text-gray-400">Belum ada gambar</span>
                    </div>
                @endif
            </div>
            
            <div class="text-sm text-gray-500">
                <div class="line-clamp-1">{{ $section->title ?? 'Tidak ada judul' }}</div>
                <div class="line-clamp-1 mt-1">{{ $section->subtitle ?? '' }}</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection