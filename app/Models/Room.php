<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Room extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'type',
        'price_monthly',
        'price_yearly',
        'size',
        'capacity',
        'quantity', // Tambahkan ini
        'initial_quantity', // tambahkan ini
        'description',
        'is_available',
        'order'
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
    // Mutator untuk memastikan is_available = false jika quantity < 1
    public function setQuantityAttribute($value)
    {
        $this->attributes['quantity'] = $value;
        $this->attributes['is_available'] = $value > 0;
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }

    public function facilities(): BelongsToMany
    {
        return $this->belongsToMany(Facility::class, 'room_facilities')
            ->withPivot('is_available')
            ->withTimestamps();
    }

    public function mainImage(): ?RoomImage
    {
        return $this->images()->where('is_main_image', true)->first();
    }

    public function getFormattedPriceMonthlyAttribute(): string
    {
        return 'Rp ' . number_format($this->price_monthly, 0, ',', '.');
    }

    public function getFormattedPriceYearlyAttribute(): ?string
    {
        return $this->price_yearly ? 'Rp ' . number_format($this->price_yearly, 0, ',', '.') : null;
    }
}
