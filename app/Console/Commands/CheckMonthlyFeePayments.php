<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\MonthlyFee;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckMonthlyFeePayments extends Command
{
    protected $signature = 'monthly-fees:check';
    protected $description = 'Check users who have not paid their monthly fees and deactivate accounts if needed';

    public function handle()
    {
        // Get all active nasabah users
        $users = User::where('role', 'nasabah')
                    ->where('status', 'active')
                    ->get();

        $now = Carbon::now();

        $unpaidCount = 0;
        $deactivatedCount = 0;

        foreach ($users as $user) {
            // Check if user has paid for the current month
            $hasPaid = MonthlyFee::where('user_id', $user->id)
                        ->whereYear('payment_date', $now->year)
                        ->whereMonth('payment_date', $now->month)
                        ->where('status', 'paid')
                        ->exists();

            if (!$hasPaid) {
                $unpaidCount++;
                $this->info("User {$user->name} has not paid for the current month.");

                // Count how many consecutive months the user has not paid
                $unpaidMonths = $this->countUnpaidMonths($user->id);

                if ($unpaidMonths > 2) {
                    $user->status = 'inactive';
                    $user->save();
                    $deactivatedCount++;
                    $this->warn("User {$user->name} has been deactivated due to {$unpaidMonths} months of unpaid fees.");
                }
            }
        }

        $this->info("Check completed. {$unpaidCount} users have not paid for the current month.");
        $this->info("{$deactivatedCount} users have been deactivated.");
    }

    private function countUnpaidMonths($userId)
    {
        $now = Carbon::now();
        $count = 0;

        // Check the last 6 months to be safe
        for ($i = 0; $i <= 6; $i++) {
            $checkDate = clone $now;
            $checkDate->subMonths($i);

            $hasPaid = MonthlyFee::where('user_id', $userId)
                        ->whereYear('payment_date', $checkDate->year)
                        ->whereMonth('payment_date', $checkDate->month)
                        ->where('status', 'paid')
                        ->exists();

            if (!$hasPaid) {
                $count++;
            } else {
                // If we find a payment, we break the consecutive unpaid streak
                break;
            }
        }

        return $count;
    }
}
