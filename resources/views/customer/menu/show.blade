@extends('layouts.app')

@section('title', $menu->name)

@section('content')
<div class="max-w-5xl mx-auto py-10">

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Gambar -->
        <img
            src="{{ asset('storage/' . $menu->image) }}"
            class="w-full rounded-lg shadow"
            alt="{{ $menu->name }}"
        >

        <!-- Detail -->
        <div>
            <h1 class="text-3xl font-bold text-amber-800 mb-4">
                {{ $menu->name }}
            </h1>

            <p class="text-gray-700 mb-4">
                {{ $menu->description }}
            </p>

            <p class="text-xl font-semibold text-amber-700 mb-6">
                Rp {{ number_format($menu->price, 0, ',', '.') }}
            </p>

            <!-- ORDER FORM -->
            <form action="{{ route('customer.order.store') }}" method="POST"
                  class="bg-white p-6 rounded-lg shadow space-y-4">
                @csrf

                <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Jumlah
                    </label>
                    <input type="number" name="qty" min="1" value="1" required
                        class="w-full border rounded px-3 py-2 focus:ring focus:ring-amber-600">
                </div>

                <div>
                    <label class="block text-sm font-semibold mb-1">
                        Tipe Pesanan
                    </label>
                    <select name="type" required
                        class="w-full border rounded px-3 py-2">
                        <option value="pickup">Pickup</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>

                <button type="submit"
                    class="w-full bg-amber-700 text-white py-2 rounded hover:bg-amber-800 transition">
                    Pesan Sekarang
                </button>
            </form>
        </div>
    </div>

</div>
@endsection