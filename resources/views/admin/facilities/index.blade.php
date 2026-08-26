@extends('layouts.admin')

@section('title', 'Manajemen Fasilitas')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Fasilitas</h1>
            <p class="text-gray-500">Kelola data fasilitas, gedung, dan layanan ruang BLUD Anda.</p>
        </div>
        <a href="{{ route('admin.facilities.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-green-900 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Fasilitas
        </a>
    </div>

    <!-- Stats Card -->
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 mb-8 inline-block">
        <div class="flex items-center gap-4">
            <div class="text-sm text-gray-500">TOTAL FASILITAS</div>
            <span class="text-3xl font-bold text-green-900">{{ $facilities->total() }}</span>
        </div>
    </div>

    <!-- Facilities Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($facilities as $facility)
        <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
            <div class="relative h-48">
                @if($facility->image)
                    <img src="{{ asset('storage/'.$facility->image) }}" alt="{{ $facility->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <span class="text-4xl text-gray-300">🏢</span>
                    </div>
                @endif
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-4 left-4">
                    <h3 class="text-white font-semibold text-lg">{{ $facility->name }}</h3>
                </div>
                <div class="absolute top-3 right-3 flex gap-2">
                    <a href="{{ route('admin.facilities.edit', $facility->id) }}" class="bg-white p-2 rounded-full text-gray-600 hover:text-green-800 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </a>
                    <form action="{{ route('admin.facilities.destroy', $facility->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-white p-2 rounded-full text-gray-600 hover:text-red-600 shadow-sm" onclick="return confirm('Yakin ingin menghapus?')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="p-5">
                <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $facility->description }}</p>
                <div class="flex items-center gap-2 text-xs text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    {{ $facility->location ?? 'Lokasi belum diatur' }}
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-3 text-center py-20">
            <div class="text-6xl mb-4">🏢</div>
            <p class="text-gray-500">Belum ada fasilitas.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection