@extends('layouts.app')

@section('title', 'My Orders')

@section('content')
    <div class="max-w-5xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-amber-800">Pesanan Saya</h1>
        </div>

        @forelse ($orders as $order)
            <div class="bg-white shadow rounded p-4 mb-4">
                <div class="flex justify-between">
                    <div>
                        <p class="font-semibold">Order #{{ $order->id }}</p>
                        <p class="text-sm text-gray-600">
                            {{ $order->created_at->format('d M Y H:i') }}
                        </p>
                    </div>

                    <span class="px-3 py-1 rounded-full text-sm
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                            @elseif($order->status === 'ready') bg-green-100 text-green-700
                            @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <p class="mt-2">
                    Total:
                    <strong>
                        Rp {{ number_format($order->total_price, 0, ',', '.') }}
                    </strong>
                </p>
            </div>
        @empty
            <div class="text-center py-12">
                <p class="text-gray-500 mb-4">
                    Kamu belum memiliki pesanan
                </p>

                <a href="{{ route('customer.menu') }}" class="bg-amber-700 text-white px-6 py-2 rounded hover:bg-amber-800">
                    Order Sekarang
                </a>
            </div>
        @endforelse

    </div>
@endsection