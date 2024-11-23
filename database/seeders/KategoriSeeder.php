<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_kategori' => "test kategori 1",
            ],
            [
                'nama_kategori' => "test kategori 2",
            ],
            [
                'nama_kategori' => "test kategori 3",
            ],
        ];

        foreach ($data as $item) {
            Kategori::create([
                'nama_kategori' => $item['nama_kategori'],
            ]);
        }
    }
}
