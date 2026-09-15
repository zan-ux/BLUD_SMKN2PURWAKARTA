@extends('layouts.admin')

@section('title', 'Edit Profil BLUD')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Profil BLUD</h1>
        <p class="text-gray-500">Kelola informasi fundamental institusi. Perubahan yang disimpan akan langsung diperbarui pada halaman publik.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <!-- Sidebar Menu -->
        <div class="lg:col-span-1">
            <div class="bg-gray-50 rounded-xl p-4 space-y-2">
                <button onclick="showTab('sejarah')" id="tab-sejarah" class="w-full flex items-center justify-between px-4 py-3 bg-gray-200 rounded-lg text-sm font-medium text-gray-900">
                    Sejarah Institusi
                    <span>→</span>
                </button>
                <button onclick="showTab('visi')" id="tab-visi" class="w-full flex items-center justify-between px-4 py-3 rounded-lg text-sm font-medium text-gray-600 hover:bg-gray-100 transition">
                    Visi & Misi
                </button>
            </div>

            <!-- Status Info -->
            <div class="bg-gray-50 rounded-xl p-6 mt-4">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-gray-400 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Status Perubahan</div>
                        <p class="text-xs text-gray-500 mt-1">Terakhir diperbarui: {{ $profile->updated_at ? $profile->updated_at->diffForHumans() : 'Baru saja' }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="lg:col-span-3 bg-white rounded-xl shadow-sm border border-gray-100 p-8">
            <!-- Form Update -->
            <form action="{{ route('admin.profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
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

                @if(session('success'))
                    <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg mb-6">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Tab Sejarah -->
                <div id="content-sejarah" class="tab-content">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Sejarah Institusi</h2>
                            <p class="text-sm text-gray-500 mt-1">Latar belakang berdirinya BLUD dan tonggak sejarah penting.</p>
                        </div>
                        <span class="bg-gray-100 text-gray-600 text-xs font-semibold px-3 py-1 rounded-full">Draft Disimpan</span>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Seksi</label>
                            <input type="text" name="institution_name" value="{{ old('institution_name', $profile->institution_name) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Konten Sejarah</label>
                            <textarea name="description" rows="8" class="w-full p-4 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('description', $profile->description) }}</textarea>
                        </div>

                        <!-- Foto Historis -->
<div>
    <label class="block text-sm font-medium text-gray-700 mb-2">Foto Historis</label>
    <div class="flex items-start gap-6">
        <div class="w-64 h-40 rounded-lg overflow-hidden bg-gray-100">
            @if($profile->foto_sejarah)
                <img src="{{ asset('storage/'.$profile->foto_sejarah) }}" alt="Foto Sejarah" class="w-full h-full object-cover">
            @else
                <div class="w-full h-full flex items-center justify-center text-gray-400">Foto belum ada</div>
            @endif
        </div>
        <div class="flex-1">
            <input type="file" name="foto_sejarah" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
            <p class="text-xs text-gray-500 mt-2">Gedung utama pada tahun peresmian (1995)</p>
        </div>
    </div>
</div>

                        <!-- Data Institusi -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Institusi</label>
                                <input type="text" name="institution_type" value="{{ old('institution_type', $profile->institution_type) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Telepon</label>
                                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email', $profile->email) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Website</label>
                                <input type="text" name="website" value="{{ old('website', $profile->website) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                <textarea name="address" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('address', $profile->address) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kota</label>
                                <input type="text" name="city" value="{{ old('city', $profile->city) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Provinsi</label>
                                <input type="text" name="province" value="{{ old('province', $profile->province) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Kode Pos</label>
                                <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab Visi & Misi -->
                <div id="content-visi" class="tab-content hidden">
                    <div class="flex items-center justify-between mb-6">
                        <div>
                            <h2 class="text-xl font-bold text-gray-900">Visi & Misi</h2>
                            <p class="text-sm text-gray-500 mt-1">Pernyataan visi dan misi institusi.</p>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Visi</label>
                            <textarea name="vision" rows="4" class="w-full p-4 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('vision', $profile->vision) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Misi</label>
                            <textarea name="mission" rows="4" class="w-full p-4 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">{{ old('mission', $profile->mission) }}</textarea>
                        </div>
                    </div>
                </div>


                <!-- Logo Institusi (Selalu Tampil) -->
                <div class="border-t border-gray-100 mt-6 pt-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Logo Institusi (Header & Footer)</label>
                        <div class="flex items-start gap-6">
                            <div class="w-64 h-40 rounded-lg overflow-hidden bg-gray-100">
                                @if($profile->logo)
                                    <img src="{{ asset('storage/'.$profile->logo) }}" alt="Logo" class="w-full h-full object-contain">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-gray-400">Logo belum ada</div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <input type="file" name="logo" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end pt-4 mt-6 border-t border-gray-100">
                    <button type="submit" class="bg-green-900 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function showTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(el => {
            el.classList.add('hidden');
        });
        document.getElementById('content-' + tabName).classList.remove('hidden');
        document.querySelectorAll('[id^="tab-"]').forEach(el => {
            el.classList.remove('bg-gray-200', 'text-gray-900');
            el.classList.add('text-gray-600');
        });
        document.getElementById('tab-' + tabName).classList.add('bg-gray-200', 'text-gray-900');
        document.getElementById('tab-' + tabName).classList.remove('text-gray-600');
    }
</script>
@endsection