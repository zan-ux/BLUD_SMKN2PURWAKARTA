@extends('layouts.admin')

@section('title', 'Edit Konten Home')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit {{ ucfirst(str_replace('_', ' ', $homeSection->key)) }}</h1>
        <p class="text-gray-500">Kelola gambar dan konten untuk bagian ini.</p>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.home-sections.update', $homeSection->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc list-inside">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="space-y-6">
                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar</label>
                    <div class="flex items-start gap-6">
                        <div class="w-64 h-40 rounded-lg overflow-hidden bg-gray-100">
                            @if($homeSection->image)
                                <img src="{{ asset('storage/'.$homeSection->image) }}" alt="Gambar" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">Belum ada gambar</div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                        </div>
                    </div>
                </div>

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                    <input type="text" name="title" value="{{ old('title', $homeSection->title) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                </div>

                <!-- Sub Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Sub Judul</label>
                    <input type="text" name="subtitle" value="{{ old('subtitle', $homeSection->subtitle) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="5" class="w-full p-4 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('description', $homeSection->description) }}</textarea>
                </div>

                <div class="flex justify-end pt-4 border-t border-gray-100">
                    <button type="submit" class="bg-green-900 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection