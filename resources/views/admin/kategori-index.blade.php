@extends('admin.layout')

@section('title', 'Admin Kategori')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Admin Kategori</h1>
        <a href="{{ route('kategori.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Create</a>
    </div>

    <table class="table-auto w-full bg-white rounded-lg shadow-md">
        <thead>
            <tr class="bg-gray-200 text-center">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Kategori</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kategoris as $kategori)
                <tr class="border-t text-center">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $kategori->nama_kategori }}</td>
                    <td class="px-4 py-2">
                        <div class="flex justify-center gap-2">
                            <a href="{{ route('kategori.edit', $kategori) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori) }}" method="POST" class="inline">
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
