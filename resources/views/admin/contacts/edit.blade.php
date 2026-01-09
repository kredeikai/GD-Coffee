@extends('layouts.admin')

@section('title', 'Edit Kontak')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold text-amber-800 mb-4">Edit Pesan</h2>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $contact->name) }}" required class="w-full px-3 py-2 border rounded">
            @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $contact->email) }}" required class="w-full px-3 py-2 border rounded">
            @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Pesan</label>
            <textarea name="message" rows="6" required class="w-full px-3 py-2 border rounded">{{ old('message', $contact->message) }}</textarea>
            @error('message')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
        </div>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded">Simpan</button>
            <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-gray-200 rounded">Batal</a>
        </div>
    </form>
</div>
@endsection
