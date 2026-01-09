@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-amber-800 to-amber-600 text-white text-center py-12 rounded-lg shadow-lg mb-10">
        <h2 class="text-4xl font-bold mb-2 tracking-wide">Tentang Kami</h2>
        <p class="text-lg opacity-90">Menghadirkan kopi terbaik sejak 2025</p>
    </div>

    <!-- Sejarah Kami -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 mb-12 items-center">
        <!-- Teks -->
        <div class="text-center md:text-left space-y-4 px-4">
            <h2 class="text-3xl font-semibold text-amber-800 flex items-center justify-center md:justify-start gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-700" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 7V3m8 4V3m-9 8h10m-9 4h9m-9 4h6" />
                </svg>
                Sejarah Kami
            </h2>
            <p class="text-gray-700 leading-relaxed text-lg">
                GD Coffe berdiri pada awal tahun 2025 sebagai hasil kolaborasi antara BAZNAS dan Pondok Pesantren Luhur
                Ciganjur. Inisiatif ini lahir dari semangat untuk memberdayakan para santri dalam bidang UMKM, khususnya
                industri kopi, agar mereka dapat mandiri secara ekonomi tanpa meninggalkan nilai-nilai keilmuan dan
                spiritual pesantren.
                Nama “GD” diambil dari inisial Gus Dur, sosok kharismatik dan pendiri Pondok Pesantren Luhur Ciganjur.
                Filosofi “GD” tidak sekadar sebuah nama, melainkan simbol dari kearifan, keterbukaan, dan kemanusiaan
                universal yang beliau ajarkan. Nilai-nilai itu menjadi fondasi utama bagi GD Coffe dalam setiap langkah dan
                cita-citanya — menyajikan kopi terbaik yang lahir dari tangan-tangan santri, dengan semangat berbagi dan
                keberkahan.
                Kami percaya bahwa secangkir kopi bukan hanya tentang rasa, tetapi tentang perjalanan, pemberdayaan, dan
                keberkahan yang mengalir dari niat baik.
            </p>
        </div>
        <!-- Ilustrasi -->
        <div class="flex justify-center md:justify-end">
            <img src="{{ asset('images/image.png') }}" alt="Sejarah GD Coffee"
                class="rounded-lg shadow-lg w-full md:w-4/5 object-cover">
        </div>
    </div>

    <!-- Visi & Misi -->
    <div class="max-w-6xl mx-auto mb-16 bg-amber-50 rounded-lg p-8 shadow-lg">
        <h2 class="text-3xl font-semibold text-amber-800 text-center mb-6 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m-3-3l-3 3m0-3V8m0 0l3-3 3 3" />
            </svg>
            Visi & Misi
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-center text-amber-800 text-4xl mb-3">☕</div>
                <p class="text-gray-700 text-center font-medium">
                    Menyajikan produk kopi berkualitas tinggi yang mencerminkan cita rasa nusantara dan nilai pesantren.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-center text-amber-800 text-4xl mb-3">🌍</div>
                <p class="text-gray-700 text-center font-medium">
                    Menjadi pelopor kopi pesantren yang berdaya saing tinggi dan berlandaskan nilai-nilai kemanusiaan,
                    keberkahan, dan kemandirian ekonomi santri.
                </p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                <div class="flex items-center justify-center text-amber-800 text-4xl mb-3">🤝</div>
                <p class="text-gray-700 text-center font-medium">
                    Menjalin kolaborasi dengan lembaga sosial, pemerintah, dan masyarakat untuk memperluas dampak ekonomi
                    umat.
                </p>
            </div>
        </div>
    </div>

    <!-- Tim Kami -->
    <div class="max-w-5xl mx-auto text-center mb-16">
        <h2 class="text-3xl font-semibold text-amber-800 mb-8 flex items-center justify-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-amber-700" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a8 8 0 00-8-8h-2a8 8 0 00-8 8v2h5" />
            </svg>
            Tim Kami
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-xl transition">
                <img src="{{ asset('images/team1.jpg') }}" alt="Founder"
                    class="w-32 h-32 object-cover mx-auto rounded-full mb-4 border-4 border-amber-600">
                <h3 class="text-xl font-semibold">Muhammad Ibrah Adzdzikra</h3>
                <p class="text-gray-600">Founder & Head Barista</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-xl transition">
                <img src="{{ asset('images/team2.jpg') }}" alt="Manager"
                    class="w-32 h-32 object-cover mx-auto rounded-full mb-4 border-4 border-amber-600">
                <h3 class="text-xl font-semibold">Muhammad Dzikri Khairrifo</h3>
                <p class="text-gray-600">Manager</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 hover:shadow-xl transition">
                <img src="{{ asset('images/team3.jpg') }}" alt="Barista"
                    class="w-32 h-32 object-cover mx-auto rounded-full mb-4 border-4 border-amber-600">
                <h3 class="text-xl font-semibold">Muhammad Lutfi</h3>
                <p class="text-gray-600">Senior Barista</p>
            </div>
        </div>
    </div>
@endsection