<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'username',
        'no_hp',
        'alamat',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }

    public function monthlyFees()
    {
        return $this->hasMany(MonthlyFee::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function receivedDeposits()
    {
        return $this->hasMany(Deposit::class, 'receiver_id');
    }

    public function processedWithdrawals()
    {
        return $this->hasMany(Withdrawal::class, 'processed_by');
    }

    public function receivedMonthlyFees()
    {
        return $this->hasMany(MonthlyFee::class, 'receiver_id');
    }

    /**
     * Boot the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            $user->deposits()->each(function ($deposit) {
                $deposit->delete();
            });
            $user->withdrawals()->each(function ($withdrawal) {
                $withdrawal->delete();
            });
            $user->monthlyFees()->each(function ($monthlyFee) {
                $monthlyFee->delete();
            });
            if ($user->balance) {
                $user->balance->delete();
            }
            $user->transactions()->each(function ($transaction) {
                $transaction->delete();
            });
            $user->receivedDeposits()->each(function ($receivedDeposit) {
                $receivedDeposit->delete();
            });
            $user->processedWithdrawals()->each(function ($processedWithdrawal) {
                $processedWithdrawal->delete();
            });
            $user->receivedMonthlyFees()->each(function ($receivedMonthlyFee) {
                $receivedMonthlyFee->delete();
            });
        });
    }
}
