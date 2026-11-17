<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\BookingController;

// Halaman utama
Route::get('/', [HotelController::class, 'index'])
    ->name('home');

// Detail hotel
Route::get('/hotel/{slug}', [HotelController::class, 'show'])
    ->name('hotel.show');

// Proses booking
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

// Konfirmasi booking
Route::get('/booking/success/{code}', [BookingController::class, 'success'])
    ->name('booking.success');
