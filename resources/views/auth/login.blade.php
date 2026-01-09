<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Coffeeshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind --}}
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Login Customer</h1>
            <p class="text-gray-500 text-sm mt-1">
                Masuk untuk melanjutkan ke Coffeeshop
            </p>
        </div>

        {{-- Alert Error Global --}}
        @if ($errors->any())
            <div class="mb-4 bg-red-100 border border-red-300 text-red-700 px-4 py-2 rounded">
                Email atau password salah.
            </div>
        @endif

        {{-- Form Login --}}
        <form method="POST" action="{{ route('login.process') }}" class="space-y-4">
            @csrf

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-400
                           @error('email') border-red-500 @enderror"
                    placeholder="contoh@email.com"
                    required
                >
                @error('email')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Password
                </label>
                <input
                    type="password"
                    name="password"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:border-blue-400
                           @error('password') border-red-500 @enderror"
                    placeholder="••••••••"
                    required
                >
                @error('password')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- Button --}}
            <div>
                <button
                    type="submit"
                    class="w-full bg-brown-600 bg-[#6F4E37] hover:bg-[#5a3f2c]
                           text-white py-2 rounded-md font-semibold transition"
                >
                    Login
                </button>
            </div>
        </form>

        {{-- Register Link --}}
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-[#6F4E37] font-semibold hover:underline">
                    Daftar di sini
                </a>
            </p>
        </div>

        {{-- Back to Home --}}
        <div class="text-center mt-4">
            <a href="/" class="text-xs text-gray-400 hover:underline">
                ← Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>
