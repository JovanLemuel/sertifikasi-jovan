<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriController;

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::resource('kategori', KategoriController::class);
Route::resource('user', UserController::class);
Route::resource('buku', BukuController::class);

Route::post('/buku/{buku}/pinjam', [BukuController::class, 'pinjamBuku'])->name('buku.pinjamBuku');
Route::post('/buku/{buku}/kembalikan', [BukuController::class, 'kembalikanBuku'])->name('buku.kembalikanBuku');

