@extends('layouts.app')

@section('title', 'Menu')

@section('content')
<div class="max-w-7xl mx-auto py-10">

    <h1 class="text-3xl font-bold text-amber-800 mb-8">
        Menu Kami
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($menus as $menu)
            <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <img
                    src="{{ asset('storage/' . $menu->image) }}"
                    class="w-full h-48 object-cover rounded-t-lg"
                    alt="{{ $menu->name }}"
                >

                <div class="p-5">
                    <h3 class="text-lg font-semibold mb-1">
                        {{ $menu->name }}
                    </h3>

                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                        {{ $menu->description }}
                    </p>

                    <div class="flex justify-between items-center">
                        <span class="font-bold text-amber-700">
                            Rp {{ number_format($menu->price, 0, ',', '.') }}
                        </span>

                        <a href="{{ route('customer.menu.show', $menu) }}"
                           class="text-sm text-white bg-amber-700 px-3 py-1 rounded hover:bg-amber-800">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection