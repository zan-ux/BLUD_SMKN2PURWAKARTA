@extends('layouts.admin')

@section('title', 'Manajemen Organigram')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Manajemen Organigram</h1>
            <p class="text-gray-500">Kelola struktur organisasi dan jabatan BLUD.</p>
        </div>
        <a href="{{ route('admin.organigrams.create') }}" class="mt-4 md:mt-0 inline-flex items-center gap-2 bg-green-900 text-white px-6 py-3 rounded-lg hover:bg-green-800 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Tambah Pejabat
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jabatan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Departemen</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Atasan</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">NIP</th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($organigrams as $organigram)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                @if($organigram->photo)
                                    <img src="{{ asset('storage/'.$organigram->photo) }}" alt="{{ $organigram->name }}" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                                        <span class="text-green-800 font-bold">{{ substr($organigram->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                <span class="font-semibold text-gray-900">{{ $organigram->name }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $organigram->position }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $organigram->department }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            {{ $organigram->parent ? $organigram->parent->name : '-' }}
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-500">{{ $organigram->description }}</td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.organigrams.edit', $organigram->id) }}" class="text-gray-500 hover:text-green-800 transition">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                </a>
                                <form action="{{ route('admin.organigrams.destroy', $organigram->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus pejabat ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-gray-500 hover:text-red-600 transition">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-20 text-center text-gray-500">
                            <div class="text-6xl mb-4">👥</div>
                            Belum ada data organisasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($organigrams->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $organigrams->links() }}
        </div>
        @endif
    </div>
</div>
@endsection