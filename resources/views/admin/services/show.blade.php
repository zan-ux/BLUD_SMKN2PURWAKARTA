@extends('layouts.admin')

@section('title', 'Detail Layanan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="mb-6">
            <a href="{{ route('admin.services.index') }}" class="text-sm text-gray-500 hover:text-green-800">← Kembali ke Daftar Layanan</a>
        </div>

        @if($service->image)
            <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->name }}" class="w-full h-96 object-cover rounded-xl mb-6">
        @endif

        <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $service->name }}</h1>
        
        <div class="flex gap-4 mb-6">
            <span class="bg-green-100 text-green-800 text-xs font-bold px-3 py-1 rounded-full">{{ $service->category }}</span>
            <span class="bg-gray-100 text-gray-700 text-xs font-bold px-3 py-1 rounded-full">
                {{ $service->is_online ? 'Online' : 'Offline' }}
            </span>
        </div>

        <div class="prose prose-lg max-w-none mb-6">
            {!! $service->description !!}
        </div>

        @if($service->requirements)
            <div class="bg-gray-50 rounded-xl p-6 mb-6">
                <h3 class="font-semibold text-gray-900 mb-2">Syarat & Ketentuan</h3>
                <p class="text-gray-600">{{ $service->requirements }}</p>
            </div>
        @endif

    </div>
</div>
@endsection