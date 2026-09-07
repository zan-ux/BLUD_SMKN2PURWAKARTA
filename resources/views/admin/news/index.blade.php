@extends('layouts.admin')

@section('title', 'Manajemen Berita')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Berita</h1>
            <p class="text-gray-500">Kelola publikasi berita, pengumuman, dan artikel terkait layanan BLUD.</p>
        </div>
        <a href="{{ route('admin.news.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-green-900 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Berita
        </a>
    </div>

    <!-- Filter Bar -->
    <div class="bg-white rounded-xl p-4 mb-8 shadow-sm border border-gray-100 flex flex-col md:flex-row gap-4">
        <div class="flex-1 relative">
            <svg class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Cari judul berita..." class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
        </div>
        <div class="flex items-center gap-4">
            <span class="text-sm font-medium text-gray-700">Status:</span>
            <div class="flex bg-gray-100 rounded-lg p-1">
                <button class="px-4 py-2 rounded-md bg-green-900 text-white text-sm font-medium">Semua</button>
                <button class="px-4 py-2 rounded-md text-gray-600 text-sm font-medium hover:text-gray-900">Diterbitkan</button>
                <button class="px-4 py-2 rounded-md text-gray-600 text-sm font-medium hover:text-gray-900">Draft</button>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($news as $item)
        <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
            <div class="h-48 overflow-hidden">
                @if($item->image)
                    <img src="{{ asset('storage/'.$item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <span class="text-4xl text-gray-300">📰</span>
                    </div>
                @endif
            </div>
            <div class="p-6">
                <div class="flex items-center justify-between text-xs text-gray-400 mb-3">
                    <span>{{ $item->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="font-semibold text-gray-900 text-lg mb-2 line-clamp-2">{{ $item->title }}</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $item->excerpt }}</p>
                <div class="flex items-center gap-4">
                    <a href="{{ route('admin.news.edit', $item->id) }}" class="text-gray-500 hover:text-green-800 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-500 hover:text-red-600 transition" onclick="return confirm('Yakin ingin menghapus?')">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-20">
            <div class="text-6xl mb-4">📰</div>
            <p class="text-gray-500">Belum ada berita.</p>
        </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-8">
        {{ $news->links() }}
    </div>
</div>
@endsection