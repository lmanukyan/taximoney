<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTaxi extends Model
{
    protected $fillable = [
        'user_id', 'taxi_id', 'price', 'color_id', 'is_painted',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function original(): BelongsTo
    {
        return $this->belongsTo(Taxi::class, 'taxi_id');
    }

    public function color(): BelongsTo
    {
        return $this->belongsTo(Color::class);
    }
}
