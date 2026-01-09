@extends('layouts.admin')

@section('title', 'Detail Kontak')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-semibold text-amber-800 mb-4">Detail Pesan</h2>

    <p><strong>Nama:</strong> {{ $contact->name }}</p>
    <p><strong>Email:</strong> {{ $contact->email }}</p>
    <p class="mt-4"><strong>Pesan:</strong></p>
    <div class="p-4 bg-gray-50 rounded mt-2">{!! nl2br(e($contact->message)) !!}</div>

    <div class="mt-6 flex gap-3">
        <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-amber-700 text-white rounded">Kembali</a>
        <a href="{{ route('contacts.edit', $contact->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Edit</a>
    </div>
</div>
@endsection
