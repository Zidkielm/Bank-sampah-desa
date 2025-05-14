<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'status' => 'active',
        ]);

        // Petugas users
        User::create([
            'name' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'petugas',
            'status' => 'active',
        ]);

        User::create([
            'name' => 'Budi Santoso',
            'username' => 'budi',
            'email' => 'budi@gmail.com',
            'no_hp' => '08123456789',
            'alamat' => 'Jl. Raya No. 123, Jakarta',
            'password' => bcrypt('123'),
            'role' => 'petugas',
            'status' => 'active',
        ]);

        // Nasabah users
        User::create([
            'name' => 'Nasabah',
            'username' => 'nasabah',
            'email' => 'nasabah@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'nasabah',
            'status' => 'active',
        ]);

        $nasabahData = [
            [
                'name' => 'Ani Susanti',
                'username' => 'ani',
                'email' => 'ani@gmail.com',
                'no_hp' => '08567891234',
                'alamat' => 'Jl. Melati No. 45, Jakarta Selatan',
                'role' => 'nasabah',
                'status' => 'active',
            ],
            [
                'name' => 'Dedi Kurniawan',
                'username' => 'dedi',
                'email' => 'dedi@gmail.com',
                'no_hp' => '08765432198',
                'alamat' => 'Jl. Mawar No. 78, Jakarta Utara',
                'role' => 'nasabah',
                'status' => 'active',
            ],
            [
                'name' => 'Rina Marlina',
                'username' => 'rina',
                'email' => 'rina@gmail.com',
                'no_hp' => '081234567890',
                'alamat' => 'Jl. Anggrek No. 12, Jakarta Barat',
                'role' => 'nasabah',
                'status' => 'active',
            ],
            [
                'name' => 'Firman Wijaya',
                'username' => 'firman',
                'email' => 'firman@gmail.com',
                'no_hp' => '089876543210',
                'alamat' => 'Jl. Dahlia No. 56, Jakarta Timur',
                'role' => 'nasabah',
                'status' => 'active',
            ],
            [
                'name' => 'Siti Nurhaliza',
                'username' => 'siti',
                'email' => 'siti@gmail.com',
                'no_hp' => '087654321098',
                'alamat' => 'Jl. Kamboja No. 34, Jakarta Pusat',
                'role' => 'nasabah',
                'status' => 'active',
            ]
        ];

        foreach ($nasabahData as $data) {
            User::create(array_merge($data, [
                'password' => bcrypt('123')
            ]));
        }
    }
}
