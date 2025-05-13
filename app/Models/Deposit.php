<?php

namespace App\Models;

use App\Traits\HasFormattedMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory, HasFormattedMoney;

    protected $fillable = [
        'user_id',
        'waste_type_id',
        'receiver_id',
        'deposit_date',
        'weight_kg',
        'price_per_kg',
        'total_amount',
        'notes',
    ];

    protected $casts = [
        'deposit_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function wasteType()
    {
        return $this->belongsTo(WasteType::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function getFormattedPriceAttribute()
    {
        return $this->formatMoney($this->price_per_kg);
    }

    public function getFormattedTotalAttribute()
    {
        return $this->formatMoney($this->total_amount);
    }

    public function getFormattedWeightAttribute()
    {
        return number_format($this->weight_kg) . ' kg';
    }

    public static function getTotalDeposits($userId = null, $startDate = null, $endDate = null)
    {
        $query = self::query();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('deposit_date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('deposit_date', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('deposit_date', '<=', $endDate);
        }

        return $query->sum('total_amount');
    }

    public static function getTotalWeight($userId = null, $startDate = null, $endDate = null)
    {
        $query = self::query();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($startDate && $endDate) {
            $query->whereBetween('deposit_date', [$startDate, $endDate]);
        } elseif ($startDate) {
            $query->where('deposit_date', '>=', $startDate);
        } elseif ($endDate) {
            $query->where('deposit_date', '<=', $endDate);
        }

        return $query->sum('weight_kg');
    }
}
