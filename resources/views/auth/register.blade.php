<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register | Coffeeshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-8">
        {{-- Header --}}
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Register Customer</h1>
            <p class="text-gray-500 text-sm mt-1">
                Buat akun untuk memesan kopi favoritmu ☕
            </p>
        </div>

        {{-- Form Register --}}
        <form method="POST" action="{{ route('register.process') }}" class="space-y-4">
            @csrf

            {{-- Name --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Lengkap
                </label>
                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring
                           @error('name') border-red-500 @enderror"
                    required
                >
                @error('name')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Email
                </label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring
                           @error('email') border-red-500 @enderror"
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
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring
                           @error('password') border-red-500 @enderror"
                    required
                >
                @error('password')
                    <small class="text-red-500 text-xs">{{ $message }}</small>
                @enderror
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Konfirmasi Password
                </label>
                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring"
                    required
                >
            </div>

            {{-- Button --}}
            <button
                type="submit"
                class="w-full bg-[#6F4E37] hover:bg-[#5a3f2c]
                       text-white py-2 rounded-md font-semibold transition"
            >
                Register
            </button>
        </form>

        {{-- Login Link --}}
        <div class="text-center mt-6">
            <p class="text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-[#6F4E37] font-semibold hover:underline">
                    Login di sini
                </a>
            </p>
        </div>
    </div>

</body>
</html>
