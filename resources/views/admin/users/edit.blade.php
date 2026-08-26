@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="max-w-2xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit User</h1>
        
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" required value="{{ old('name', $user->name) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Nama lengkap">
                @error('name')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="email" name="email" required value="{{ old('email', $user->email) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="email@example.com">
                @error('email')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No. Telepon</label>
                <input type="text" name="phone" value="{{ old('phone', $user->phone) }}"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="+62 812-3456-7890">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru (Opsional)</label>
                <input type="password" name="password"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Kosongkan jika tidak ingin mengubah">
                @error('password')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800"
                    placeholder="Ulangi password baru">
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                <select name="role" required class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:border-green-800 focus:ring-1 focus:ring-green-800">
                    <option value="viewer" {{ $user->role === 'viewer' ? 'selected' : '' }}>Viewer (User Biasa)</option>
                    <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>
            
            <div class="flex gap-4">
                <button type="submit" class="flex-1 bg-green-900 text-white font-semibold py-3 rounded-lg hover:bg-green-800 transition">
                    Update User
                </button>
                <a href="{{ route('admin.users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection