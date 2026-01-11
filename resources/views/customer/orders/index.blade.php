@extends('layouts.app')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-6xl mx-auto py-10">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-amber-800">
            Pesanan Saya
        </h1>

        <a href="{{ route('customer.menu') }}"
           class="bg-amber-700 text-white px-4 py-2 rounded hover:bg-amber-800 transition">
            Order Sekarang
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-800 px-4 py-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    @forelse($orders as $order)
        <div class="bg-white shadow rounded-lg p-6 mb-4">
            <div class="flex justify-between items-center mb-3">
                <div>
                    <p class="font-semibold">
                        Order #{{ $order->id }}
                    </p>
                    <p class="text-sm text-gray-500">
                        {{ $order->created_at->format('d M Y, H:i') }}
                    </p>
                </div>

                <span class="
                    px-3 py-1 rounded text-sm font-semibold
                    @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                    @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                    @elseif($order->status === 'ready') bg-green-100 text-green-800
                    @endif
                ">
                    {{ ucfirst($order->status) }}
                </span>
            </div>

            <div class="border-t pt-3">
                @foreach($order->items as $item)
                    <div class="flex justify-between text-sm mb-1">
                        <span>
                            {{ $item->menu->name }} × {{ $item->qty }}
                        </span>
                        <span>
                            Rp {{ number_format($item->price * $item->qty, 0, ',', '.') }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="border-t mt-3 pt-3 flex justify-between font-semibold">
                <span>Total</span>
                <span>
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </span>
            </div>
        </div>
    @empty
        <div class="text-center text-gray-500 py-16">
            <p class="mb-4">Kamu belum memiliki pesanan</p>
            <a href="{{ route('customer.menu') }}"
               class="text-amber-700 font-semibold">
                Mulai Order Sekarang →
            </a>
        </div>
    @endforelse
</div>
@endsection