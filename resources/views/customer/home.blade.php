@extends('layouts.app')

@section('title', 'Home')

@section('content')

    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-amber-800 to-amber-600 text-white text-center py-12 rounded-lg shadow-lg mb-10">
        <h2 class="text-4xl font-bold mb-2 tracking-wide">Selamat Datang di GD Coffee</h2>
        <p class="text-lg opacity-90">Kopi pilihan, suasana nyaman, dan momen terbaik bersama teman</p>
    </div>

    <!-- Intro -->
    <div class="max-w-3xl mx-auto text-center mb-12">
        <p class="text-gray-700 text-lg leading-relaxed">
            GD Coffee bukan sekadar tempat menikmati kopi, tapi ruang untuk berbagi cerita, inspirasi, dan kehangatan.
            Diambil dari nama <strong>Gus Dur</strong>, tempat ini membawa semangat beliau—tentang keberagaman, keikhlasan,
            dan cinta terhadap sesama. Setiap tegukan kopi adalah bentuk kecil dari filosofi itu.
        </p>
    </div>

    <!-- Suasana Section -->
    <h2 class="text-2xl font-semibold text-center text-amber-800 mb-6">Suasana di GD Coffee</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
        <!-- Sore -->
        <div class="relative rounded-lg overflow-hidden shadow-lg">
            <img src="{{ asset('images/sore.jpg') }}" 
                 alt="Suasana Sore" 
                 class="w-full object-cover" 
                 style="height: 480px; object-position: center;">
            <div class="absolute bottom-0 bg-black bg-opacity-40 text-white w-full text-center py-3">
                <p class="text-lg font-semibold">Suasana Sore – Hangat, Cerah, dan Penuh Cerita</p>
            </div>
        </div>

        <!-- Malam -->
        <div class="relative rounded-lg overflow-hidden shadow-lg">
            <img src="{{ asset('images/malam.jpg') }}" 
                 alt="Suasana Malam" 
                 class="w-full object-cover" 
                 style="height: 480px; object-position: center;">
            <div class="absolute bottom-0 bg-black bg-opacity-40 text-white w-full text-center py-3">
                <p class="text-lg font-semibold">Suasana Malam – Tenang, Nyaman, dan Penuh Kehangatan</p>
            </div>
        </div>
    </div>

    <!-- Menu Section -->
    <h2 class="text-2xl font-semibold text-center text-amber-800 mb-6">Rekomendasi Kami</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Gede Aren -->
        <div class="bg-white shadow rounded-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="{{ asset('images/gede-aren.jpg') }}" alt="Gede Aren" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold mb-2 text-amber-800">Gede Aren</h3>
                <p class="text-gray-600">Manis alami dari gula aren berpadu dengan kopi khas GD.</p>
            </div>
        </div>

        <!-- Taro -->
        <div class="bg-white shadow rounded-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="{{ asset('images/taro.jpg') }}" alt="Taro" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold mb-2 text-amber-800">Taro</h3>
                <p class="text-gray-600">Rasa lembut dan manis khas taro yang bikin rileks.</p>
            </div>
        </div>

        <!-- Americano -->
        <div class="bg-white shadow rounded-lg overflow-hidden hover:scale-105 transform transition duration-300">
            <img src="{{ asset('images/americano.jpg') }}" alt="Americano" class="w-full h-48 object-cover">
            <div class="p-4 text-center">
                <h3 class="text-xl font-semibold mb-2 text-amber-800">Americano</h3>
                <p class="text-gray-600">Kopi hitam klasik dengan rasa ringan dan aroma khas.</p>
            </div>
        </div>
    </div>

    <!-- Tombol Kotak ke Menu -->
    <div class="mt-12 flex justify-center">
        <a href="/customer/menu" 
           class="block bg-amber-700 text-white text-lg font-semibold px-10 py-5 rounded-lg shadow-lg hover:bg-amber-600 hover:shadow-xl transform hover:scale-105 transition duration-300">
            ☕ Lihat Menu Lengkap
        </a>
    </div>

    <br><br>
@endsection
