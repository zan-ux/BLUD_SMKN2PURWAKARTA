@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="mb-6">
        <a href="{{ route('admin.contact-messages.index') }}" class="text-sm text-gray-500 hover:text-green-800">← Kembali ke Daftar Pesan</a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="flex items-start gap-4 mb-6">
            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center flex-shrink-0">
                <span class="text-green-800 font-bold">{{ substr($contactMessage->name, 0, 1) }}</span>
            </div>
            <div>
                <h1 class="text-2xl font-bold text-gray-900">{{ $contactMessage->name }}</h1>
                <div class="text-sm text-gray-500">{{ $contactMessage->email }}</div>
                <div class="text-sm text-gray-400 mt-1">{{ $contactMessage->created_at->format('d M Y H:i') }}</div>
            </div>
        </div>

        <div class="mb-6">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold 
                {{ $contactMessage->status === 'new' ? 'bg-yellow-100 text-yellow-800' : ($contactMessage->status === 'read' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800') }}">
                {{ ucfirst($contactMessage->status) }}
            </span>
        </div>

        <div class="bg-gray-50 rounded-xl p-6 mb-6">
            <h3 class="font-semibold text-gray-900 mb-2">{{ $contactMessage->subject }}</h3>
            <p class="text-gray-600 leading-relaxed">{{ $contactMessage->message }}</p>
        </div>

        @if($contactMessage->phone)
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-700 mb-2">No. Telepon</h4>
            <p class="text-gray-600">{{ $contactMessage->phone }}</p>
        </div>
        @endif

        <div class="flex justify-end gap-4 pt-4 border-t border-gray-100">
            <button onclick="markAsReplied({{ $contactMessage->id }})" class="bg-green-900 text-white px-6 py-2 rounded-lg text-sm font-medium hover:bg-green-800 transition">
                Tandai Dibalas
            </button>
            <form action="{{ route('admin.contact-messages.destroy', $contactMessage->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-50 text-red-600 px-6 py-2 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                    Hapus Pesan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function markAsReplied(messageId) {
        fetch(`/admin/contact-messages/${messageId}/replied`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>
@endsection