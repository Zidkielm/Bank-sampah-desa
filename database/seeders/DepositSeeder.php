<?php

namespace Database\Seeders;

use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WasteType;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DepositSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nasabahUsers = User::where('role', 'nasabah')->get();
        $petugasUsers = User::where('role', 'petugas')->get();
        $wasteTypes = WasteType::all();

        if ($nasabahUsers->isEmpty() || $petugasUsers->isEmpty() || $wasteTypes->isEmpty()) {
            return;
        }

        foreach ($nasabahUsers as $nasabah) {
            $numberOfDeposits = rand(1, 5);

            for ($i = 0; $i < $numberOfDeposits; $i++) {
                $wasteType = $wasteTypes->random();
                $receiver = $petugasUsers->random();
                $dateOffset = rand(1, 60);
                $weight = rand(1, 10) + (rand(0, 9) / 10);
                $total = $weight * $wasteType->price_per_kg;

                $depositDate = Carbon::now()->subDays($dateOffset)->format('Y-m-d');

                $deposit = Deposit::create([
                    'user_id' => $nasabah->id,
                    'waste_type_id' => $wasteType->id,
                    'receiver_id' => $receiver->id,
                    'deposit_date' => $depositDate,
                    'weight_kg' => $weight,
                    'price_per_kg' => $wasteType->price_per_kg,
                    'total_amount' => $total,
                    'notes' => 'Setor sampah ' . $wasteType->name,
                ]);

                $userBalance = $nasabah->balance()->first();
                $balanceAfter = $userBalance ? $userBalance->amount + $total : $total;

                Transaction::create([
                    'user_id' => $nasabah->id,
                    'transactionable_id' => $deposit->id,
                    'transactionable_type' => Deposit::class,
                    'amount' => $total,
                    'type' => 'credit',
                    'balance_after' => $balanceAfter,
                    'description' => 'Setoran sampah ' . $wasteType->name . ' seberat ' . $weight . 'kg',
                ]);

                if ($userBalance) {
                    $userBalance->update([
                        'amount' => $balanceAfter
                    ]);
                }
            }
        }
    }
}
