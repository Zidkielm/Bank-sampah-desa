<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyFee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'receiver_id',
        'payment_date',
        'amount',
        'payment_method',
        'status',
        'proof_image',
        'notes',
        'rejection_reason',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    protected $appends = ['proof_image_url'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function transaction()
    {
        return $this->morphOne(Transaction::class, 'transactionable');
    }

    public function getProofImageUrlAttribute()
    {
        return $this->proof_image ? asset('storage/' . $this->proof_image) : null;
    }
}
