@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto p-6">

    <h1 class="text-3xl font-bold text-amber-800 mb-8">
        Admin
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">

        <!-- Total Menu -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600">Total Menu</h3>
            <p class="text-3xl font-bold text-amber-700">
                {{ $totalMenus }}
            </p>
        </div>

        <!-- Total Order -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600">Total Order</h3>
            <p class="text-3xl font-bold text-blue-600">
                {{ $totalOrders }}
            </p>
        </div>

        <!-- Pending Order -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600">Order Pending</h3>
            <p class="text-3xl font-bold text-yellow-600">
                {{ $pendingOrder }}
            </p>
        </div>

        <!-- Feedback -->
        <div class="bg-white shadow rounded-lg p-6">
            <h3 class="text-gray-600">Feedback Masuk</h3>
            <p class="text-3xl font-bold text-green-600">
                {{ $totalContact }}
            </p>
        </div>

    </div>

    <br><br>

    <div class="mt-10 flex gap-4">
        <a href="{{ route('menus.index') }}"
           class="bg-amber-700 text-white px-4 py-2 rounded hover:bg-amber-800">
            Kelola Menu
        </a>

        <a href="{{ route('contacts.index') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Lihat Feedback
        </a>
    </div>

</div>
@endsection
