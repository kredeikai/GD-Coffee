@extends('layouts.admin')

@section('title', 'Order Customer')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-2xl font-bold mb-6 text-amber-800">
        Daftar Order Customer
    </h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full border-collapse bg-white shadow rounded">
        <thead class="bg-amber-700 text-white">
            <tr>
                <th class="p-4 text-left">Customer</th>
                <th class="p-4">Tipe</th>
                <th class="p-4">Total</th>
                <th class="p-4">Status</th>
                <th class="p-4">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr class="border-b">
                <td class="p-3">
                    {{ $order->user->name }}
                </td>

                <td class="p-3 text-center">
                    {{ ucfirst($order->type) }}
                </td>

                <td class="p-3 text-center">
                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                </td>

                <td class="p-3 text-center">
                    <span class="px-3 py-1 rounded text-sm
                        @if($order->status === 'pending') bg-yellow-100 text-yellow-700
                        @elseif($order->status === 'processing') bg-blue-100 text-blue-700
                        @elseif($order->status === 'ready') bg-green-100 text-green-700
                        @endif">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>

                <td class="p-3 text-center">
                    <form method="POST"
                          action="{{ route('admin.orders.updateStatus', $order) }}">
                        @csrf
                        @method('PATCH')

                        <select name="status"
                                class="border rounded px-2 py-1 text-sm">
                            <option value="pending" @selected($order->status==='pending')>Pending</option>
                            <option value="processing" @selected($order->status==='processing')>Processing</option>
                            <option value="ready" @selected($order->status==='ready')>Ready</option>
                        </select>

                        <button
                            class="ml-2 bg-amber-700 text-white px-3 py-1 rounded hover:bg-amber-800 text-sm">
                            Update
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
