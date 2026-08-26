@extends('layouts.admin')

@section('title', 'Edit Pejabat')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Pejabat</h1>
        <p class="text-gray-500">Perbarui data pejabat dan struktur organisasi BLUD.</p>
    </div>

    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.organigrams.update', $organigram->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                    <input type="text" name="name" value="{{ old('name', $organigram->name) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jabatan</label>
                    <input type="text" name="position" value="{{ old('position', $organigram->position) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Departemen</label>
                    <input type="text" name="department" value="{{ old('department', $organigram->department) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Atasan Langsung</label>
                    <select name="parent_id" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                        <option value="">-- Tidak Ada (Root) --</option>
                        @foreach($parents as $parent)
                            <option value="{{ $parent->id }}" {{ $organigram->parent_id == $parent->id ? 'selected' : '' }}>
                                {{ $parent->name }} - {{ $parent->position }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi / NIP</label>
                    <textarea name="description" rows="3"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('description', $organigram->description) }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Foto</label>
                    <div class="flex items-center gap-4">
                        <div class="w-32 h-32 rounded-lg overflow-hidden bg-gray-100">
                            @if($organigram->photo)
                                <img src="{{ asset('storage/'.$organigram->photo) }}" alt="Foto" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="photo" accept="image/*"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                        </div>
                    </div>
                </div>

                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.organigrams.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection