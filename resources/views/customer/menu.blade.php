@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="max-w-6xl mx-auto py-10">

    <h2 class="text-3xl font-semibold text-center text-amber-800 mb-8">
        Menu Kami
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($menus as $menu)
            <div class="bg-white rounded-lg shadow p-4">

                @if($menu->image_path)
                    <img src="{{ asset('images/' . $menu->image_path) }}"
                         alt="{{ $menu->name }}"
                         class="w-full h-40 object-cover rounded mb-3">
                @else
                    <div class="w-full h-40 bg-gray-200 rounded mb-3 flex items-center justify-center">
                        <span class="text-gray-500">Tidak ada gambar</span>
                    </div>
                @endif

                <h3 class="text-lg font-semibold text-amber-800">{{ $menu->name }}</h3>

                <p class="text-sm text-gray-600 mt-2">
                    {{ Str::limit($menu->description, 100) }}
                </p>

                <p class="mt-3 font-bold text-amber-700">
                    Rp {{ number_format($menu->price, 0, ',', '.') }}
                </p>

            </div>
        @empty
            <p class="text-gray-500 col-span-3 text-center">
                Belum ada menu tersedia.
            </p>
        @endforelse
    </div>

</div>
@endsection
