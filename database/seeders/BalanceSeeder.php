<?php

namespace Database\Seeders;

use App\Models\Balance;
use App\Models\User;
use Illuminate\Database\Seeder;

class BalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nasabahUsers = User::where('role', 'nasabah')->get();

        foreach ($nasabahUsers as $user) {
            Balance::create([
                'user_id' => $user->id,
                'amount' => rand(50000, 250000)
            ]);
        }
    }
}
