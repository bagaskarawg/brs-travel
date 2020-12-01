<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Route extends Model
{
    use HasFactory;

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
}
