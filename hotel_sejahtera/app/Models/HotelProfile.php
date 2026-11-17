<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelProfile extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'address',
        'phone',
        'email',
        'facilities',
        'image',
        'price_per_night',
        'is_active',
    ];
}
