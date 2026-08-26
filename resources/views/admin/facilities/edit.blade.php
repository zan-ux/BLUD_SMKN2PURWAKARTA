@extends('layouts.admin')

@section('title', 'Edit Fasilitas')

@section('content')
<div class="max-w-4xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Fasilitas</h1>
        <p class="text-gray-500">Perbarui informasi fasilitas.</p>
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
        <form action="{{ route('admin.facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Nama Fasilitas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Fasilitas</label>
                    <input type="text" name="name" value="{{ old('name', $facility->name) }}" required
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Masukkan nama fasilitas">
                    @error('name')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Kategori -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                    <select name="category" class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                        <option value="Olahraga" {{ $facility->category == 'Olahraga' ? 'selected' : '' }}>Olahraga</option>
                        <option value="Laboratorium" {{ $facility->category == 'Laboratorium' ? 'selected' : '' }}>Laboratorium</option>
                        <option value="Ruang Pertemuan" {{ $facility->category == 'Ruang Pertemuan' ? 'selected' : '' }}>Ruang Pertemuan</option>
                        <option value="Unit Usaha" {{ $facility->category == 'Unit Usaha' ? 'selected' : '' }}>Unit Usaha</option>
                        <option value="Lainnya" {{ $facility->category == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                    </select>
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Deskripsi fasilitas">{{ old('description', $facility->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Lokasi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lokasi</label>
                    <input type="text" name="location" value="{{ old('location', $facility->location) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Contoh: Gedung A, Lantai 2">
                </div>

                <!-- Kapasitas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Kapasitas</label>
                    <input type="text" name="capacity" value="{{ old('capacity', $facility->capacity) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Contoh: 100 Orang">
                </div>

                <!-- Jam Operasional -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Jam Operasional</label>
                    <input type="text" name="operating_hours" value="{{ old('operating_hours', $facility->operating_hours) }}"
                        class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                        placeholder="Contoh: 08.00 - 16.00 WIB">
                </div>

                <!-- Gambar -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Fasilitas</label>
                    <div class="flex items-center gap-4">
                        <div class="w-48 h-32 rounded-lg overflow-hidden bg-gray-100">
                            @if($facility->image)
                                <img src="{{ asset('storage/'.$facility->image) }}" alt="Gambar" class="w-full h-full object-cover">
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
                            <input type="radio" name="status" value="available" {{ $facility->status == 'available' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Tersedia</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="maintenance" {{ $facility->status == 'maintenance' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Perawatan</span>
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="radio" name="status" value="unavailable" {{ $facility->status == 'unavailable' ? 'checked' : '' }} class="text-green-800 focus:ring-green-800">
                            <span class="text-sm text-gray-700">Tidak Tersedia</span>
                        </label>
                    </div>
                </div>

                <!-- Submit -->
                <div class="flex gap-4 pt-4">
                    <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                        Update Fasilitas
                    </button>
                    <a href="{{ route('admin.facilities.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection