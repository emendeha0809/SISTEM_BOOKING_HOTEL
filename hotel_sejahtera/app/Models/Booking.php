<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'booking_code',
        'customer_name',
        'customer_email',
        'customer_phone',
        'checkin_date',
        'checkout_date',
        'total_nights',
        'price_per_night',
        'total_price',
        'status',
        'source',
    ];

    protected function casts(): array
    {
        return [
            'checkin_date' => 'date',
            'checkout_date' => 'date',
            'price_per_night' => 'decimal:2',
            'total_price' => 'decimal:2',
        ];
    }
}
