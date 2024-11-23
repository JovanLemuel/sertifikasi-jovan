@extends('admin.layout')

@section('title', 'Edit Kategori')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Edit Kategori</h1>
        <a href="{{ route('kategori.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Back</a>
    </div>

    <form action="{{ route('kategori.update', $kategori) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="nama_kategori" class="block text-sm font-medium text-gray-700">Nama Kategori</label>
            <input type="text" id="nama_kategori" name="nama_kategori"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="masukkan nama kategori" value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
            @error('nama_kategori')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Update</button>
    </form>
@endsection
