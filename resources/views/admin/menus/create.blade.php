@extends('layouts.admin')

@section('title', 'Tambah Menu')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold text-amber-800 mb-4">Tambah Menu</h2>

    <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}" required 
                   class="w-full px-3 py-2 border rounded">
            @error('name')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="description" rows="4" 
                      class="w-full px-3 py-2 border rounded">{{ old('description') }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Harga (angka)</label>
            <input type="number" name="price" value="{{ old('price', 0) }}" required 
                   class="w-full px-3 py-2 border rounded">
            @error('price')
                <div class="text-red-600 text-sm">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium">Gambar (opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1" checked>
            <label>Aktifkan menu</label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded">Simpan</button>

            <a href="{{ route('menus.index') }}" 
               class="px-4 py-2 bg-gray-200 rounded">
                Batal
            </a>
        </div>

    </form>
</div>
@endsection
