<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        $kategoris = Kategori::all();
        $query = Buku::query();

        if ($request->kategori_id) {
            $query->whereHas('kategori', function ($q) use ($request) {
                $q->where('kategoris.id', $request->kategori_id);
            });
        }

        if ($request->user_id) {
            $query->where('user_id', $request->user_id);
        }

        $bukus = $query->get();

        return view('admin.buku-index', compact('bukus', 'kategoris', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.buku-create', compact('kategoris'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'deskripsi_buku' => 'required|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
        ]);

        $buku = Buku::create($request->only('nama_buku', 'deskripsi_buku'));
        $buku->kategori()->sync($request->kategori);

        return redirect()->route('buku.index')->with('success', 'Buku telah terbuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategoris = Kategori::all();
        return view('admin.buku-edit', compact('buku', 'kategoris'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255',
            'deskripsi_buku' => 'required|string',
            'kategori' => 'required|array',
            'kategori.*' => 'exists:kategoris,id',
        ]);

        $buku->update($request->only('nama_buku', 'deskripsi_buku'));
        $buku->kategori()->sync($request->kategori);

        return redirect()->route('buku.index')->with('success', 'Buku telah terubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        return redirect()->route('buku.index')->with('success', 'Buku telah terhapus');
    }

    public function pinjamBuku(Request $request, Buku $buku)
    {
        if ($buku->user_id !== null) {
            return redirect()->back()->with('error', 'Buku sudah dipinjam');
        }

        $buku->update(['user_id' => $request->user_id]);

        return redirect()->route('buku.index')->with('success', 'Buku telah dipinjam');
    }

    public function kembalikanBuku(Buku $buku)
    {
        if ($buku->user_id === null) {
            return redirect()->back()->with('error', 'This book is not currently borrowed.');
        }

        $buku->update(['user_id' => null]);

        return redirect()->route('buku.index')->with('success', 'Buku telah dikembalikan');
    }
}
