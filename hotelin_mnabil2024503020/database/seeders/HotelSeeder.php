<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        Hotel::updateOrCreate(
            ['slug' => 'hotel-nusantara'],
            [
                'name' => 'Hotel Nusantara',
                'description' => 'Hotel nyaman dengan fasilitas modern untuk perjalanan bisnis dan liburan.',
                'address' => 'Situbondo, Jawa Timur',
                'price_per_night' => 350000,
                'image' => 'hotel-nusantara.jpg',
                'facilities' => 'WiFi, AC, Restoran, Parkir',
                'is_active' => true,
            ]
        );

        Hotel::updateOrCreate(
            ['slug' => 'hotel-sejahtera'],
            [
                'name' => 'Hotel Sejahtera',
                'description' => 'Hotel nyaman dengan harga terjangkau dan fasilitas lengkap.',
                'address' => 'Situbondo, Jawa Timur',
                'price_per_night' => 250000,
                'image' => 'hotel-sejahtera.jpg',
                'facilities' => 'WiFi, AC, TV, Parkir',
                'is_active' => true,
            ]
        );
    }
}
