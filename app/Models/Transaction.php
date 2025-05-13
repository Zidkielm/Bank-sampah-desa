<?php

namespace App\Models;

use App\Traits\HasFormattedMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory, HasFormattedMoney;

    protected $fillable = [
        'user_id',
        'transactionable_id',
        'transactionable_type',
        'amount',
        'type',
        'balance_after',
        'description',
    ];

    protected $casts = [
        'transactionable_id' => 'integer',
        'amount' => 'decimal:2',
        'balance_after' => 'decimal:2',
    ];

    public function transactionable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getFormattedAmountAttribute()
    {
        return $this->formatMoney($this->amount);
    }

    public function getFormattedBalanceAfterAttribute()
    {
        return $this->formatMoney($this->balance_after);
    }
}
