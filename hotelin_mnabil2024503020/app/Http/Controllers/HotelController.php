<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    // Menampilkan seluruh hotel
    public function index()
    {
        $hotels = Hotel::where('is_active', true)
            ->latest()
            ->get();

        return view('hotels.index', compact('hotels'));
    }

    // Menampilkan detail hotel
    public function show($slug)
    {
        $hotel = Hotel::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return view('hotels.show', compact('hotel'));
    }
}
