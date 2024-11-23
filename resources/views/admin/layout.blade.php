<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    <nav class="bg-white border-b border-gray-200 px-4 py-3 shadow-md">
        <div class="flex justify-between items-center">
            <a href="/" class="text-xl font-semibold text-gray-800">Manajemen <span
                    class="text-blue-500">Perpustakaan</span></a>
        </div>
    </nav>

    <div class="flex">
        <aside class="w-64 bg-white border-r border-gray-200 h-screen">
            <div class="py-4">
                <ul class="mt-6 space-y-2">
                    <li>
                        <a href="/dashboard" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('buku.index') }}"
                            class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                            Buku
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('kategori.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                            Kategori
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user.index') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-200 rounded-md">
                            Anggota
                        </a>
                    </li>
                </ul>
            </div>
        </aside>

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>

</html>
