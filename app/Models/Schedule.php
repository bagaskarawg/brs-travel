<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const DAYS = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

    public function route(): BelongsTo
    {
        return $this->belongsTo(Route::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function getDayTextAttribute()
    {
        return self::DAYS[$this->day];
    }

    public function getFormattedPassengerCapacityAttribute()
    {
        return number_format($this->passenger_capacity, 0, ',', '.');
    }
}
