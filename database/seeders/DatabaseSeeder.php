<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DashboardTableSeeder::class,
            UserSeeder::class,
            WasteTypeSeeder::class,
            BalanceSeeder::class,
            DepositSeeder::class,
            MonthlyFeeSeeder::class,
            WithdrawalSeeder::class,
        ]);
    }
}
