@extends('layouts.admin')

@section('title', 'Edit Layanan')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Layanan</h1>
        <p class="text-gray-500">Perbarui informasi layanan.</p>
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

    <!-- Form Edit -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Nama Layanan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Layanan</label>
                    <input type="text" name="name" value="{{ old('name', $service->name) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Masukkan nama layanan">
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                        <option value="Jasa Produksi" {{ $service->category == 'Jasa Produksi' ? 'selected' : '' }}>Jasa Produksi</option>
                        <option value="Penyewaan" {{ $service->category == 'Penyewaan' ? 'selected' : '' }}>Penyewaan</option>
                        <option value="Pelatihan" {{ $service->category == 'Pelatihan' ? 'selected' : '' }}>Pelatihan</option>
                        <option value="Konsultasi" {{ $service->category == 'Konsultasi' ? 'selected' : '' }}>Konsultasi</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Deskripsi layanan">{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Syarat & Ketentuan -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Syarat & Ketentuan</label>
                    <textarea name="requirements" rows="3"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Syarat untuk menggunakan layanan ini">{{ old('requirements', $service->requirements) }}</textarea>
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Layanan</label>
                    <div class="flex items-center gap-4">
                        <div class="w-48 h-32 rounded-lg overflow-hidden bg-gray-100">
                            @if($service->image)
                                <img src="{{ asset('storage/'.$service->image) }}" alt="Gambar" class="w-full h-full object-cover">
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

                <!-- Status -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                    <div class="flex gap-4">
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="active" {{ $service->status == 'active' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Aktif</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="inactive" {{ $service->status == 'inactive' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Nonaktif</span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                        Update Layanan
                    </button>
                    <a href="{{ route('admin.services.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection