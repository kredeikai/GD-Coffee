@extends('layouts.app')

@section('title', 'Kontak')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-amber-800 to-amber-600 text-white text-center py-12 rounded-lg shadow-lg mb-10">
        <h2 class="text-4xl font-bold mb-2 tracking-wide">Hubungi Kami</h2>
        <p class="text-lg opacity-90">Kami siap melayani pertanyaan dan masukan Anda</p>
    </div>

    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="max-w-3xl mx-auto mb-6">
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg shadow">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <!-- Kontak Info -->
    <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        <!-- Alamat -->
        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition">
            <div class="flex justify-center mb-4 text-amber-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5 9 6.343 9 8s1.343 3 3 3z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 22s8-4.5 8-10a8 8 0 10-16 0c0 5.5 8 10 8 10z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Alamat</h3>
            <p class="text-gray-600">📍 Jl. Al Munawaroh No.11, RT.2/RW.5, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630</p>
        </div>

        <!-- Telepon -->
        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition">
            <div class="flex justify-center mb-4 text-amber-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a2 2 0 011.79 1.105l1.42 2.842a2 2 0 01-.445 2.237l-1.404 1.404a11.042 11.042 0 005.657 5.657l1.404-1.404a2 2 0 012.237-.445l2.842 1.42A2 2 0 0121 17.72V21a2 2 0 01-2 2h-1C9.163 23 1 14.837 1 4V3a2 2 0 012-2h2z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Telepon</h3>
            <p class="text-gray-600">📞 0851-1767-4700</p>
        </div>

        <!-- Email -->
        <div class="bg-white rounded-lg shadow-lg p-6 text-center hover:shadow-xl transition">
            <div class="flex justify-center mb-4 text-amber-800">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-18 0a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2V8z" />
                </svg>
            </div>
            <h3 class="text-xl font-semibold mb-2 text-amber-800">Email</h3>
            <p class="text-gray-600">✉️ GDcoffee@gmail.com</p>
        </div>
    </div>

    <!-- Form Kontak -->
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8 text-center mb-16">
        <h3 class="text-2xl font-semibold text-amber-800 mb-6">Kirim Pesan</h3>

        <form action="{{ route('customer.contact') }}" method="POST" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nama" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">

                <input type="email" name="email" placeholder="Email" required
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600">
            </div>

            <textarea name="message" placeholder="Tulis pesan Anda..." rows="4" required
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-amber-600"></textarea>

            <button type="submit"
                class="bg-amber-700 text-white px-6 py-2 rounded-lg hover:bg-amber-800 transition">
                Kirim Pesan
            </button>
        </form>
    </div>
@endsection
