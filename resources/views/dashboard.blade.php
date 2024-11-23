<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @include('layout.navbar')
    <div class="flex">
        @include('layout.sidebar')
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-xl font-semibold">Total Buku</h3>
                    <p class="text-3xl mt-2">123</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-xl font-semibold">Total Kategori</h3>
                    <p class="text-3xl mt-2">4</p>
                </div>
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-xl font-semibold">Total Anggota</h3>
                    <p class="text-3xl mt-2">56</p>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
