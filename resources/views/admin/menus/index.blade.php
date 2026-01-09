@extends('layouts.admin')

@section('title', 'Daftar Menu')

@section('content')
<div class="max-w-6xl mx-auto">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-amber-800">Daftar Menu</h2>
        <a href="{{ route('menus.create') }}" class="px-4 py-2 bg-amber-700 text-white rounded">
            Tambah Menu
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($menus as $menu)
            <div class="bg-white rounded-lg p-4 shadow">

                @if($menu->image_path)
                    <img src="{{ asset('images/' . $menu->image_path) }}"
                    class="w-full h-40 object-cover rounded mb-4"
                    alt="{{ $menu->name }}">
                @endif

                <h3 class="text-lg font-semibold text-amber-800">{{ $menu->name }}</h3>

                <p class="text-sm text-gray-600 mt-2">{{ Str::limit($menu->description, 120) }}</p>

                <div class="mt-3 flex justify-between items-center">
                    <span class="font-bold">
                        Rp {{ number_format($menu->price,0,',','.') }}
                    </span>

                    <div class="flex gap-2">
                        <a href="{{ route('menus.edit', $menu->id) }}" class="text-blue-600">Edit</a>

                        <form action="{{ route('menus.destroy', $menu->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus menu ini?');">

                            @csrf
                            @method('DELETE')

                            <button class="text-red-600">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada menu.</p>
        @endforelse
    </div>

    <div class="mt-6">
        {{ $menus->links() }}
    </div>

</div>
@endsection
