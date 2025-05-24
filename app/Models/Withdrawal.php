<?php

namespace App\Models;

use App\Traits\HasFormattedMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    use HasFactory, HasFormattedMoney;

    protected $fillable = [
        'user_id',
        'processed_by',
        'withdrawal_date',
        'amount',
        'cash_amount',
        'total_amount',
        'notes',
    ];

    protected $casts = [
        'withdrawal_date' => 'date',
        'amount' => 'float',
        'cash_amount' => 'float',
        'total_amount' => 'float',
    ];

    public function getFormattedAmountAttribute()
    {
        return $this->formatMoney($this->amount);
    }

    public function getFormattedCashAmountAttribute()
    {
        return $this->formatMoney($this->cash_amount);
    }

    public function getFormattedTotalAttribute()
    {
        return $this->formatMoney($this->total_amount);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function processor()
    {
        return $this->belongsTo(User::class, 'processed_by');
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function items()
    {
        return $this->hasMany(WithdrawalItem::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($withdrawal) {
            $withdrawal->items()->each(function ($item) {
                $item->delete();
            });
            if ($withdrawal->transaction) {
                $withdrawal->transaction->delete();
            }
        });
    }
}
