<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_buku' => "test buku 1",
                'deskripsi_buku' => "deskripsi buku 1",
                'user_id' => '1',
            ],
            [
                'nama_buku' => "test buku 2",
                'deskripsi_buku' => "deskripsi buku 2",
                'user_id' => '1',
            ],
            [
                'nama_buku' => "test buku 3",
                'deskripsi_buku' => "deskripsi buku 3",
                'user_id' => '1',
            ],
        ];

        foreach ($data as $item) {
            Buku::create([
                'nama_buku' => $item['nama_buku'],
                'deskripsi_buku' => $item['deskripsi_buku'],
                'user_id' => $item['user_id'],
            ]);
        }
    }
}
