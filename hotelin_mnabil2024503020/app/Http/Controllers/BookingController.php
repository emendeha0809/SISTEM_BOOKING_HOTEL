<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    // Memproses pemesanan hotel
    public function store(Request $request)
    {
        $validated = $request->validate([
            'hotel_id' => 'required|exists:hotels,id',
            'customer_name' => 'required|string|max:255',
            'checkin_date' => 'required|date|after_or_equal:today',
            'checkout_date' => 'required|date|after:checkin_date',
        ], [
            'customer_name.required' => 'Nama pemesan wajib diisi.',
            'checkin_date.after_or_equal' => 'Tanggal check-in tidak boleh sebelum hari ini.',
            'checkout_date.after' => 'Tanggal check-out harus setelah check-in.',
        ]);

        // Mengambil data hotel dari database
        $hotel = Hotel::where('id', $validated['hotel_id'])
            ->where('is_active', true)
            ->firstOrFail();

        // Menghitung jumlah malam
        $checkin = Carbon::parse($validated['checkin_date']);
        $checkout = Carbon::parse($validated['checkout_date']);

        $totalNights = $checkin->diffInDays($checkout);

        // Menghitung total harga berdasarkan database
        $price = $hotel->price_per_night;
        $totalPrice = $price * $totalNights;

        // Membuat kode booking
        $bookingCode = 'HTL-' . strtoupper(Str::random(8));

        // Menyimpan data booking
        $booking = Booking::create([
            'booking_code' => $bookingCode,
            'hotel_id' => $hotel->id,
            'customer_name' => $validated['customer_name'],
            'checkin_date' => $checkin,
            'checkout_date' => $checkout,
            'total_nights' => $totalNights,
            'price_per_night' => $price,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()->route(
            'booking.success',
            $booking->booking_code
        );
    }

    // Menampilkan konfirmasi booking
    public function success($code)
    {
        $booking = Booking::with('hotel')
            ->where('booking_code', $code)
            ->firstOrFail();

        return view('bookings.success', compact('booking'));
    }
}
