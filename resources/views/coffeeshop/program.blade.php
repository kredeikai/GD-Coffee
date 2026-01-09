@extends('layouts.layout')

@section('title', 'Program')

@section('content')

<div class="bg-gradient-to-r from-amber-800 to-amber-600 text-white text-center py-12 rounded-lg shadow-lg mb-10">
    <h2 class="text-4xl font-bold mb-2 tracking-wide">Program Spesial GD Coffee</h2>
    <p class="text-lg opacity-90">Kopi pilihan, suasana santai, dan kegiatan seru bareng komunitas GD.</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <!-- Ngobrol Santuy -->
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="{{ asset('images/ngobrol-santuy.jpg') }}" alt="Ngobrol Santuy" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4 text-center">
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Ngobrol Santuy</h3>
            <p class="text-gray-600">Ngopi sambil berbagi cerita dan ide kreatif bareng komunitas GD.</p>
        </div>
    </div>

    <!-- Bazar -->
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="{{ asset('images/bazar.jpg') }}" alt="Bazar" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4 text-center">
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Bazar</h3>
            <p class="text-gray-600">Ajang seru untuk menampilkan produk UMKM dan karya santri berbakat.</p>
        </div>
    </div>

    <!-- Cobain Mesin Kopi -->
    <div class="bg-white rounded-lg shadow hover:shadow-lg transition">
        <img src="{{ asset('images/cobain-mesinkopi.jpg') }}" alt="Cobain Mesin Kopi" class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4 text-center">
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Cobain Mesin Kopi</h3>
            <p class="text-gray-600">Rasakan pengalaman jadi barista dan bikin kopi pakai mesin profesional!</p>
        </div>
    </div>
</div>

<br><br>
```

@endsection
