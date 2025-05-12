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
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'admin',
            'status' => 'active',
        ]);
        User::create([
            'name' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'petugas',
            'status' => 'active',
        ]);
        User::create([
            'name' => 'Nasabah',
            'username' => 'nasabah',
            'email' => 'nasabah@gmail.com',
            'password' => bcrypt('123'),
            'role' => 'nasabah',
            'status' => 'active',
        ]);
    }
}
