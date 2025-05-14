<?php

namespace Database\Seeders;

use App\Models\MonthlyFee;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class MonthlyFeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nasabahUsers = User::where('role', 'nasabah')->get();
        $petugasUsers = User::where('role', 'petugas')->get();

        if ($nasabahUsers->isEmpty() || $petugasUsers->isEmpty()) {
            return;
        }

        $paymentMethods = ['cash', 'transfer'];

        $feeAmounts = [10000, 15000, 20000];

        for ($month = 1; $month <= 3; $month++) {
            $paymentDate = Carbon::now()->subMonths($month);

            foreach ($nasabahUsers as $nasabah) {
                if (rand(1, 100) <= 70) {
                    $receiver = $petugasUsers->random();
                    $paymentMethod = $paymentMethods[array_rand($paymentMethods)];
                    $amount = $feeAmounts[array_rand($feeAmounts)];

                    $monthlyFee = MonthlyFee::create([
                        'user_id' => $nasabah->id,
                        'receiver_id' => $receiver->id,
                        'payment_date' => $paymentDate->format('Y-m-d'),
                        'amount' => $amount,
                        'payment_method' => $paymentMethod,
                        'status' => 'paid',
                        'proof_image' => $paymentMethod === 'transfer' ? 'monthly_fees/sample_proof.jpg' : null,
                        'notes' => 'Pembayaran iuran bulan ' . $paymentDate->format('F Y'),
                    ]);

                    $userBalance = $nasabah->balance()->first();
                    if ($userBalance) {
                        $balanceAfter = $userBalance->amount - $amount;

                        Transaction::create([
                            'user_id' => $nasabah->id,
                            'transactionable_id' => $monthlyFee->id,
                            'transactionable_type' => MonthlyFee::class,
                            'amount' => $amount,
                            'type' => 'debit',
                            'balance_after' => $balanceAfter,
                            'description' => 'Pembayaran iuran bulan ' . $paymentDate->format('F Y'),
                        ]);

                        $userBalance->update([
                            'amount' => $balanceAfter
                        ]);
                    }
                }
            }
        }
    }
}
