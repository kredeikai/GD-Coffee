@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Detail Menu</h1>

    <p><strong>Name:</strong> {{ $menu->name }}</p>
    <p><strong>Description:</strong> {{ $menu->description }}</p>
    <p><strong>Price:</strong> Rp {{ number_format($menu->price) }}</p>

    @if ($menu->image_path)
        <img src="{{ asset('images/' . $menu->image_path) }}" width="200" alt="{{ $menu->name }}">
    @endif
</div>
@endsection
