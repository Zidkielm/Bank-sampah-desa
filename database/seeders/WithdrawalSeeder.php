<?php

namespace Database\Seeders;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use App\Models\WithdrawalItem;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class WithdrawalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nasabahUsers = User::where('role', 'nasabah')
            ->whereHas('balance', function($query) {
                $query->where('amount', '>=', 25000);
            })
            ->get();

        $petugasUsers = User::where('role', 'petugas')->get();

        if ($nasabahUsers->isEmpty() || $petugasUsers->isEmpty()) {
            return;
        }

        $items = [
            ['item_name' => 'Beras', 'price' => 12000],
            ['item_name' => 'Minyak Goreng', 'price' => 18000],
            ['item_name' => 'Gula', 'price' => 15000],
            ['item_name' => 'Telur', 'price' => 25000],
            ['item_name' => 'Tepung Terigu', 'price' => 10000],
            ['item_name' => 'Susu', 'price' => 20000],
            ['item_name' => 'Sabun', 'price' => 5000],
            ['item_name' => 'Pasta Gigi', 'price' => 8000],
            ['item_name' => 'Shampoo', 'price' => 12000],
            ['item_name' => 'Detergen', 'price' => 15000],
        ];

        foreach ($nasabahUsers as $nasabah) {
            if (rand(0, 1)) {
                $balanceObject = $nasabah->balance()->first();
                if (!$balanceObject) continue;

                $currentBalance = $balanceObject->amount;
                $maxWithdrawal = min($currentBalance * 0.7, 100000);

                $itemCount = rand(1, 3);
                $totalWithdrawal = 0;
                $withdrawalDate = Carbon::now()->subDays(rand(1, 30))->format('Y-m-d');
                $processor = $petugasUsers->random();

                $withdrawal = Withdrawal::create([
                    'user_id' => $nasabah->id,
                    'processed_by' => $processor->id,
                    'withdrawal_date' => $withdrawalDate,
                    'amount' => 0,
                    'cash_amount' => 0,
                    'total_amount' => 0,
                    'notes' => 'Penarikan untuk kebutuhan sehari-hari',
                ]);

                $selectedItems = array_rand($items, $itemCount);
                if (!is_array($selectedItems)) $selectedItems = [$selectedItems];

                $itemTotal = 0;
                foreach ($selectedItems as $itemIndex) {
                    $item = $items[$itemIndex];
                    $quantity = rand(1, 3);
                    $itemPrice = $item['price'];
                    $total = $quantity * $itemPrice;
                    $itemTotal += $total;

                    WithdrawalItem::create([
                        'withdrawal_id' => $withdrawal->id,
                        'item_name' => $item['item_name'],
                        'quantity' => $quantity,
                        'price' => $itemPrice,
                        'total_amount' => $total,
                    ]);
                }

                $cashAmount = 0;
                if (rand(1, 100) <= 30) {
                    $cashAmount = rand(10000, 50000) / 1000 * 1000;
                }

                $totalAmount = $itemTotal + $cashAmount;

                $withdrawal->update([
                    'amount' => $itemTotal,
                    'cash_amount' => $cashAmount,
                    'total_amount' => $totalAmount,
                ]);

                if ($totalAmount <= $maxWithdrawal) {
                    $balanceAfter = $currentBalance - $totalAmount;

                    Transaction::create([
                        'user_id' => $nasabah->id,
                        'transactionable_id' => $withdrawal->id,
                        'transactionable_type' => Withdrawal::class,
                        'amount' => $totalAmount,
                        'type' => 'debit',
                        'balance_after' => $balanceAfter,
                        'description' => 'Penarikan untuk pembelian barang kebutuhan',
                    ]);

                    $balanceObject->update([
                        'amount' => $balanceAfter
                    ]);
                } else {
                    $withdrawal->delete();
                }
            }
        }
    }
}
