@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Tambah User Baru</h1>
        
        <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" required value="{{ old('name') }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Nama lengkap">
                @error('name')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required value="{{ old('email') }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="email@example.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                <input type="text" name="phone" value="{{ old('phone') }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="+62 812-3456-7890">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Minimal 8 karakter">
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" required
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Ulangi password">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                    <option value="viewer">Viewer (User Biasa)</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            
            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                    Simpan User
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection