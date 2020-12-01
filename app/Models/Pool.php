<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pool extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function destinationRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'destination_pool_id');
    }

    public function sourceRoutes(): HasMany
    {
        return $this->hasMany(Route::class, 'source_pool_id');
    }
}
