<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'hotel_id',
        'customer_name',
        'checkin_date',
        'checkout_date',
        'total_nights',
        'price_per_night',
        'total_price',
        'status',
    ];

    protected $casts = [
        'checkin_date' => 'date',
        'checkout_date' => 'date',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
