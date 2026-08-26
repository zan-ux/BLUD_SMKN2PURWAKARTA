@extends('layouts.admin')

@section('title', 'Manajemen Layanan')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Layanan</h1>
            <p class="text-gray-500">Kelola daftar layanan Jasa Produksi, Penyewaan, dan Pelatihan BLUD.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-green-900 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Layanan
        </a>
    </div>

    <!-- Filter Category -->
    <div class="flex gap-2 mb-8 overflow-x-auto">
        <button class="px-4 py-2 bg-green-900 text-white rounded-full text-sm font-medium whitespace-nowrap">Semua</button>
        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap">Jasa Produksi</button>
        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap">Penyewaan</button>
        <button class="px-4 py-2 bg-gray-100 text-gray-600 rounded-full text-sm font-medium hover:bg-gray-200 whitespace-nowrap">Pelatihan</button>
    </div>

    <!-- Services Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse($services as $service)
        <div class="bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
            <div class="h-40 overflow-hidden">
                @if($service->image)
                    <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gray-100 flex items-center justify-center">
                        <span class="text-4xl text-gray-300">🛠️</span>
                    </div>
                @endif
            </div>
            <div class="p-5">
                <h3 class="font-semibold text-gray-900 mb-2 line-clamp-1">{{ $service->name }}</h3>
                <p class="text-sm text-gray-500 line-clamp-2 mb-4">{{ $service->description }}</p>
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.services.edit', $service->id) }}" class="flex-1 text-center bg-gray-100 text-gray-700 py-2 rounded-lg text-sm font-medium hover:bg-gray-200 transition">
                        Edit
                    </a>
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-50 text-red-600 p-2 rounded-lg hover:bg-red-100 transition" onclick="return confirm('Yakin ingin menghapus?')">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-4 text-center py-20">
            <div class="text-6xl mb-4">🛠️</div>
            <p class="text-gray-500">Belum ada layanan.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection