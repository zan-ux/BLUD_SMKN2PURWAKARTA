@extends('layouts.admin')

@section('title', 'Tambah Berita')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Tambah Berita</h1>
        <p class="text-gray-500">Buat publikasi berita baru untuk BLUD.</p>
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

    @if(session('error'))
        <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <!-- Form Create -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="space-y-6">
                <!-- Profile ID (Hidden) -->
                <input type="hidden" name="profile_id" value="{{ $profiles->first()->id ?? 1 }}">

                <!-- Judul -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Judul Berita</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
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
                        <option value="Pengumuman">Pengumuman</option>
                        <option value="Informasi">Informasi</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Prestasi">Prestasi</option>
                    </select>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Utama</label>
                    <div class="flex items-center gap-4">
                        <div id="image-preview" class="w-48 h-32 rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                            <span class="text-gray-400 text-sm">Preview</span>
                        </div>
                        <div class="flex-1">
                            <input type="file" name="image" id="image-input" accept="image/*"
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
                            class="w-full p-4 focus:outline-none resize-none"
                            placeholder="Tulis konten berita di sini...">{{ old('content') }}</textarea>
                    </div>
                    @error('content')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tags -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Tags (pisahkan dengan koma)</label>
                    <input type="text" name="tags" value="{{ old('tags') }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="contoh: vokasi, pelatihan, pendidikan">
                </div>

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="draft" checked class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Draft</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="published" class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Published</span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                        Simpan Berita
                    </button>
                    <a href="{{ route('admin.news.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Preview gambar
    document.getElementById('image-input').addEventListener('change', function(e) {
        const preview = document.getElementById('image-preview');
        const file = e.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full h-full object-cover">`;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection