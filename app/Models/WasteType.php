<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price_per_kg',
        'image_path',
        'description',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($wasteType) {
            if ($wasteType->image_path) {
                $imagePath = public_path('storage/' . $wasteType->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
            $wasteType->deposits()->each(function ($deposit) {
                $deposit->delete();
            });
        });
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image_path ? asset('storage/' . $this->image_path) : null;
    }
}
