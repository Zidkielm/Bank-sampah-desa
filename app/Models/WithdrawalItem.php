<?php

namespace App\Models;

use App\Traits\HasFormattedMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalItem extends Model
{
    use HasFactory, HasFormattedMoney;

    protected $fillable = [
        'withdrawal_id',
        'item_name',
        'quantity',
        'price',
        'total_amount'
    ];

    protected $casts = [
        'quantity' => 'float',
        'price' => 'float',
        'total_amount' => 'float',
    ];

    public function withdrawal()
    {
        return $this->belongsTo(Withdrawal::class);
    }

    public function getFormattedPriceAttribute()
    {
        return $this->formatMoney($this->price);
    }

    public function getFormattedTotalAttribute()
    {
        return $this->formatMoney($this->total_amount);
    }
}
