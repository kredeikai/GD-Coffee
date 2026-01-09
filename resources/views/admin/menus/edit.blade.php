@extends('layouts.admin')

@section('title', 'Edit Menu')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold text-amber-800 mb-4">Edit Menu</h2>

    <form action="{{ route('menus.update', $menu->id) }}" 
          method="POST" enctype="multipart/form-data" class="space-y-4">

        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name', $menu->name) }}"
                   required class="w-full px-3 py-2 border rounded">
        </div>

        <div>
            <label class="block text-sm font-medium">Deskripsi</label>
            <textarea name="description" rows="4"
                      class="w-full px-3 py-2 border rounded">{{ old('description', $menu->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium">Harga (angka)</label>
            <input type="number" name="price" value="{{ old('price', $menu->price) }}"
                   required class="w-full px-3 py-2 border rounded">
        </div>

        <div>
            <label class="block text-sm font-medium">Gambar Saat Ini</label>

            @if($menu->image_path)
                <img src="{{ asset('images/' . $menu->image_path) }}"
                     class="w-40 h-32 object-cover rounded mb-2">
            @endif

            <label class="block text-sm font-medium mt-2">Ganti Gambar (opsional)</label>
            <input type="file" name="image" accept="image/*" class="w-full">
        </div>

        <div class="flex items-center gap-2">
            <input type="checkbox" name="is_active" value="1"
                   {{ $menu->is_active ? 'checked' : '' }}>
            <label>Aktifkan menu</label>
        </div>

        <div class="flex gap-3">
            <button type="submit" class="px-4 py-2 bg-amber-700 text-white rounded">Simpan</button>

            <a href="{{ route('menus.index') }}" class="px-4 py-2 bg-gray-200 rounded">
                Batal
            </a>
        </div>

    </form>
</div>
@endsection
