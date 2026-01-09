<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex min-h-screen">

    <!-- SIDEBAR -->
    <aside class="w-64 bg-amber-800 text-white">
        <div class="p-6 text-2xl font-bold border-b border-amber-700">
            Admin Panel
        </div>

        <nav class="mt-4">
            <a href="{{ route('admin.dashboard') }}"
               class="block px-6 py-3 hover:bg-amber-700">
                Dashboard
            </a>

            <a href="{{ route('menus.index') }}"
               class="block px-6 py-3 hover:bg-amber-700">
                Menu
            </a>

            <a href="{{ route('admin.orders.index') }}"
               class="block px-6 py-3 hover:bg-amber-700">
                Orders
            </a>

            <a href="{{ route('contacts.index') }}"
               class="block px-6 py-3 hover:bg-amber-700">
                Feedback
            </a>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button
                    class="w-full text-left px-6 py-3 hover:bg-red-600">
                    Logout
                </button>
            </form>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

</body>
</html>
