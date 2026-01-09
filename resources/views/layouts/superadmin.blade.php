<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Superadmin')</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <aside class="w-64 bg-amber-800 text-white">
        <div class="p-6 text-2xl font-bold border-b border-amber-700">
            Admin Panel
        </div>

        <nav class="mt-4">
            <a href="{{ route('superadmin.dashboard') }}"
               class="block px-6 py-3 hover:bg-amber-700">
                Dashboard
            </a>

            <form method="POST" action="{{ route('superadmin.logout') }}">
                @csrf
                <button class="w-full text-left px-6 py-3 hover:bg-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>
