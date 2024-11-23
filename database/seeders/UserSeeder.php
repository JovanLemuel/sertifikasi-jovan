<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => "Jovan",
                'email' => "admin@admin",
                'password' => Hash::make('admin123'),
                'tipe_anggota' => 'admin',
            ],
            [
                'name' => "user 1",
                'email' => "user1@user",
                'password' => Hash::make('user123'),
                'tipe_anggota' => 'anggota',
            ],
            [
                'name' => "user 2",
                'email' => "user2@user",
                'password' => Hash::make('user123'),
                'tipe_anggota' => 'anggota',
            ],
        ];

        foreach ($data as $item) {
            User::create([
                'name' => $item['name'],
                'email' => $item['email'],
                'password' => $item['password'],
                'tipe_anggota' => $item['tipe_anggota'],
            ]);
        }
    }
}
