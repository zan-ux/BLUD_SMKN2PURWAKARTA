@extends('layouts.admin')

@section('title', 'Edit Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Berita</h1>
        <p class="text-gray-500">Perbarui publikasi berita.</p>
    </div>

    <!-- Form Edit -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title', $news->title) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Masukkan judul berita">
                    @error('title')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                        <option value="Pengumuman" {{ $news->category == 'Pengumuman' ? 'selected' : '' }}>Pengumuman</option>
                        <option value="Informasi" {{ $news->category == 'Informasi' ? 'selected' : '' }}>Informasi</option>
                        <option value="Kegiatan" {{ $news->category == 'Kegiatan' ? 'selected' : '' }}>Kegiatan</option>
                        <option value="Prestasi" {{ $news->category == 'Prestasi' ? 'selected' : '' }}>Prestasi</option>
                    </select>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                    <div class="flex items-center gap-4">
                        <div class="w-48 h-32 rounded-lg overflow-hidden bg-gray-100">
                            @if($news->image)
                                <img src="{{ asset('storage/'.$news->image) }}" alt="Gambar" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="text-gray-400 text-sm">Tidak ada gambar</span>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <input type="file" name="image" accept="image/*"
                                class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                            @error('image')
                                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Konten -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Konten Berita</label>
                    <div class="border border-gray-200 rounded-lg overflow-hidden">
                        <div class="bg-gray-50 px-4 py-2 border-b border-gray-200 flex gap-3">
                            <button type="button" class="text-gray-600 hover:text-green-800"><b>B</b></button>
                            <button type="button" class="text-gray-600 hover:text-green-800"><i>I</i></button>
                            <button type="button" class="text-gray-600 hover:text-green-800">H</button>
                            <button type="button" class="text-gray-600 hover:text-green-800">¶</button>
                            <button type="button" class="text-gray-600 hover:text-green-800">🔗</button>
                        </div>
                        <textarea name="content" id="content" rows="10" required
                            class="w-full p-4 focus:outline-none resize-none">{{ old('content', $news->content) }}</textarea>
                    </div>
                    @error('content')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags (pisahkan dengan koma)</label>
                    <input type="text" name="tags" value="{{ old('tags', $news->tags) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="contoh: vokasi, pelatihan, pendidikan">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="draft" {{ $news->status == 'draft' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Draft</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="published" {{ $news->status == 'published' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Published</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="archived" {{ $news->status == 'archived' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Archived</span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                        Update Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection