<?php

namespace App\Models;

use App\Traits\HasFormattedMoney;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory, HasFormattedMoney;

    protected $fillable = [
        'user_id',
        'amount',
    ];

    public function getFormattedAmountAttribute()
    {
        return $this->formatMoney($this->amount);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
