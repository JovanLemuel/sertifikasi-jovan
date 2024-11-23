@extends('admin.layout')

@section('title', 'Admin Buku')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Admin Buku</h1>
    </div>

    <div class="flex justify-between items-end mb-6">
        <form method="GET" action="{{ route('buku.index') }}" class="flex gap-4">
            <div>
                <label for="kategori_id" class="block text-sm font-medium text-gray-700">Filter Kategori</label>
                <select id="kategori_id" name="kategori_id" class="border rounded-md px-4 py-2">
                    <option value="">semua</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" {{ request('kategori_id') == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="user_id" class="block text-sm font-medium text-gray-700">Filter User</label>
                <select id="user_id" name="user_id" class="border rounded-md px-4 py-2">
                    <option value="">semua</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                    Filter
                </button>
            </div>
        </form>

        <a href="{{ route('buku.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
            Create
        </a>
    </div>

    <table class="table-auto w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-center">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Buku</th>
                <th class="px-4 py-2">Deskripsi</th>
                <th class="px-4 py-2">Kategori</th>
                <th class="px-4 py-2">Status</th>
                <th class="px-4 py-2">Pinjaman</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bukus as $buku)
                <tr class="border-t text-center">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $buku->nama_buku }}</td>
                    <td class="px-4 py-2">{{ $buku->deskripsi_buku }}</td>
                    <td class="px-4 py-2">
                        @if ($buku->kategori->isNotEmpty())
                            {{ $buku->kategori->pluck('nama_kategori')->join(', ') }}
                        @else
                            <span class="text-gray-500">Tidak Ada Kategori</span>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if ($buku->user_id)
                            Dipinjam oleh {{ $buku->user->name }}
                        @else
                            Tersedia
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        @if (!$buku->user_id)
                            <form action="{{ route('buku.pinjamBuku', $buku) }}" method="POST">
                                @csrf
                                <select name="user_id" required class="border rounded-md px-2 py-1">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 ml-2">
                                    Pinjam
                                </button>
                            </form>
                        @else
                            <form action="{{ route('buku.kembalikanBuku', $buku) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                                    Kembalikan
                                </button>
                            </form>
                        @endif
                    </td>
                    <td class="px-4 py-2">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('buku.edit', $buku) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('buku.destroy', $buku) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
