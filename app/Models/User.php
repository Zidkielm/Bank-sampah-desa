<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    public $incrementing = false;
    protected $keyType = 'string';
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

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public static function generateUserId($name)
    {
        $words = explode(' ', trim($name));
        $initials = '';
        foreach ($words as $word) {
            if (!empty($word)) {
                $initials .= strtoupper(substr($word, 0, 1));
            }
        }

        $dateFormat = date('dmy');

        $baseId = $initials . $dateFormat;

        return DB::transaction(function () use ($baseId) {
            $datePattern = substr($baseId, -6);
            $existingUsers = self::where('id', 'LIKE', '%' . $datePattern . '%')
                               ->lockForUpdate()
                               ->get();

            $sequences = [];
            foreach ($existingUsers as $user) {
                if (preg_match('/^[A-Z]+' . $datePattern . '(\d{3})$/', $user->id, $matches)) {
                    $sequences[] = (int) $matches[1];
                }
            }

            if (empty($sequences)) {
                $nextSequence = 1;
            } else {
                sort($sequences);
                $nextSequence = max($sequences) + 1;
            }

            $sequenceFormatted = str_pad($nextSequence, 3, '0', STR_PAD_LEFT);

            return $baseId . $sequenceFormatted;
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if (empty($user->id)) {
                $user->id = self::generateUserId($user->name);
            }
        });

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
