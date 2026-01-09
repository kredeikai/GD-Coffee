@extends('layouts.admin')

@section('title', 'Daftar Kontak')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-amber-800">Daftar Kontak</h2>
        <div>
            <a href="{{ route('contacts.index', ['trashed' => $withTrashed ? 0 : 1]) }}"
               class="px-4 py-2 bg-amber-700 text-white rounded-lg">
               {{ $withTrashed ? 'Sembunyikan Trash' : 'Tampilkan Trash' }}
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="min-w-full table-auto">
            <thead class="bg-amber-50">
                <tr>
                    <th class="px-4 py-2 text-left">#</th>
                    <th class="px-4 py-2 text-left">Nama</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-left">Tanggal</th>
                    <th class="px-4 py-2 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $c)
                    <tr class="{{ $c->trashed() ? 'opacity-60' : '' }}">
                        <td class="px-4 py-2">{{ $c->id }}</td>
                        <td class="px-4 py-2">{{ $c->name }}</td>
                        <td class="px-4 py-2">{{ $c->email }}</td>
                        <td class="px-4 py-2">{{ $c->created_at->format('Y-m-d H:i') }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('contacts.show', $c->id) }}" class="text-amber-700 mr-2">Lihat</a>
                            @if(!$c->trashed())
                                <a href="{{ route('contacts.edit', $c->id) }}" class="text-blue-600 mr-2">Edit</a>
                                <form action="{{ route('contacts.destroy', $c->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600">Hapus</button>
                                </form>
                            @else
                                <form action="{{ route('contacts.restore', $c->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    <button class="text-green-600">Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="px-4 py-6 text-center text-gray-500">Belum ada pesan.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $contacts->withQueryString()->links() }}
    </div>
</div>
@endsection
