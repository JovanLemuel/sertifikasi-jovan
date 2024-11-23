@extends('admin.layout')

@section('title', 'Create Buku')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Create Buku</h1>
        <a href="{{ route('buku.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md">Back</a>
    </div>

    <form action="{{ route('buku.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
        @csrf
        <div class="mb-4">
            <label for="nama_buku" class="block text-sm font-medium text-gray-700">Nama Buku</label>
            <input type="text" id="nama_buku" name="nama_buku"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="masukkan nama buku" value="{{ old('nama_buku') }}">
            @error('nama_buku')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label for="deskripsi_buku" class="block text-sm font-medium text-gray-700">Deskripsi Buku</label>
            <textarea id="deskripsi_buku" name="deskripsi_buku" rows="4"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                placeholder="masukkan deskripsi buku">{{ old('deskripsi_buku') }}</textarea>
            @error('deskripsi_buku')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Kategori</label>
            <div class="mt-2">
                @foreach ($kategoris as $kategori)
                    <div class="flex items-center">
                        <input type="checkbox" id="kategori_{{ $kategori->id }}" name="kategori[]"
                            value="{{ $kategori->id }}"
                            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
                            {{ in_array($kategori->id, old('kategori', [])) ? 'checked' : '' }}>
                        <label for="kategori_{{ $kategori->id }}" class="ml-2 block text-sm text-gray-700">
                            {{ $kategori->nama_kategori }}
                        </label>
                    </div>
                @endforeach
            </div>
            @error('kategori')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Create</button>
    </form>
@endsection
