@extends('layouts.admin')

@section('title', 'Detail Pejabat')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="mb-6">
            <a href="{{ route('admin.organigrams.index') }}" class="text-sm text-gray-500 hover:text-green-800">← Kembali ke Daftar</a>
        </div>

        <div class="flex items-start gap-6">
            @if($organigram->photo)
                <img src="{{ asset('storage/'.$organigram->photo) }}" alt="{{ $organigram->name }}" class="w-32 h-32 rounded-xl object-cover">
            @else
                <div class="w-32 h-32 bg-green-100 rounded-xl flex items-center justify-center">
                    <span class="text-4xl text-green-800 font-bold">{{ substr($organigram->name, 0, 1) }}</span>
                </div>
            @endif

            <div>
                <h1 class="text-2xl font-bold text-gray-900 mb-2">{{ $organigram->name }}</h1>
                <div class="text-green-800 font-semibold mb-2">{{ $organigram->position }}</div>
                <div class="text-gray-500 text-sm mb-4">{{ $organigram->department }}</div>
                
                @if($organigram->description)
                    <div class="bg-gray-50 rounded-xl p-4">
                        <div class="text-xs font-semibold text-gray-500 uppercase mb-1">NIP / Deskripsi</div>
                        <p class="text-gray-700">{{ $organigram->description }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection