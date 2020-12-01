<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function destinationPool(): BelongsTo
    {
        return $this->belongsTo(Pool::class, 'destination_pool_id');
    }

    public function sourcePool(): BelongsTo
    {
        return $this->belongsTo(Pool::class, 'source_pool_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function getFormattedPriceAttribute()
    {
        return 'Rp ' . number_format($this->price, 0, ',', '.');
    }

    public function getFormattedPackageDeliveryPriceAttribute()
    {
        return 'Rp ' . number_format($this->package_delivery_price, 0, ',', '.');
    }

    public function getFormattedPackageDeliveryPriceNextKgAttribute()
    {
        return 'Rp ' . number_format($this->package_delivery_price_next_kg, 0, ',', '.');
    }
}
