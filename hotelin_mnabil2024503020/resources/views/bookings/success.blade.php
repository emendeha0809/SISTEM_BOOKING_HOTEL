@extends('layouts.app')

@section('title', 'Booking Berhasil - Hotelin')

@section('content')

<div class="container">

    <div class="panel success-card">

        <div class="success-icon">✓</div>

        <h1>Pemesanan Berhasil!</h1>

        <p style="color:#758197; margin-top:10px;">
            Terima kasih telah melakukan pemesanan
            melalui Hotelin.
        </p>

        <div style="background:#edf5ff; padding:18px; border-radius:10px; margin-top:25px;">

            <p>Kode Booking Anda</p>

            <h2 style="color:#1769d2;">
                {{ $booking->booking_code }}
            </h2>

        </div>

        <div class="booking-info">

            <h3>Detail Pemesanan</h3>

            <p><strong>Nama:</strong>
                {{ $booking->customer_name }}</p>

            <p><strong>Hotel:</strong>
                {{ $booking->hotel->name }}</p>

            <p><strong>Lokasi:</strong>
                {{ $booking->hotel->address }}</p>

            <p><strong>Check-in:</strong>
                {{ $booking->checkin_date->format('d-m-Y') }}</p>

            <p><strong>Check-out:</strong>
                {{ $booking->checkout_date->format('d-m-Y') }}</p>

            <p><strong>Jumlah Malam:</strong>
                {{ $booking->total_nights }} malam</p>

            <p><strong>Status:</strong>
                {{ ucfirst($booking->status) }}</p>

        </div>

        <div class="booking-total">

            <p>Total Pembayaran</p>

            <h2 style="color:#1769d2;">
                Rp{{ number_format($booking->total_price, 0, ',', '.') }}
            </h2>

        </div>

        <a href="{{ route('home') }}"
           class="btn"
           style="margin-top:25px;">
            Kembali ke Beranda
        </a>

    </div>

</div>

@endsection
