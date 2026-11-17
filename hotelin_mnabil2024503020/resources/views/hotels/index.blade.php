@extends('layouts.app')

@section('title', 'Hotelin - Temukan Hotel Terbaik')

@section('content')

<section class="hero">
    <h1>Temukan Hotel Terbaik untuk Perjalananmu!</h1>

    <p>
        Pesan hotel favoritmu dengan mudah, cepat,
        dan harga yang transparan hanya di Hotelin.
    </p>
</section>

<div class="container">

    <section class="hotel-section" id="hotel">

        <h2 class="section-title">
            Rekomendasi Hotel
        </h2>

        <p style="color:#758197; margin-bottom:25px; font-size:14px;">
            Pilih hotel yang sesuai dengan kebutuhan perjalananmu.
        </p>

        <div class="hotel-grid">

            @forelse($hotels as $hotel)

                <div class="hotel-card">

                    <img
                        src="{{ $hotel->image && filter_var($hotel->image, FILTER_VALIDATE_URL) ? $hotel->image : asset('images/' . ($hotel->image ?? '')) }}"
                        alt="{{ $hotel->name }}"
                        class="hotel-image"
                        onerror="this.src='https://placehold.co/800x500/eaf2fc/1769d2?text=Hotelin'">

                    <div class="hotel-content">

                        <h3>{{ $hotel->name }}</h3>

                        <p>
                            <strong>Lokasi:</strong>
                            {{ $hotel->address }}
                        </p>

                        <p style="margin-top:8px;">
                            {{ $hotel->description }}
                        </p>

                        <p style="margin-top:12px;">
                            <strong>Fasilitas:</strong>
                            {{ $hotel->facilities }}
                        </p>

                        <div class="hotel-price">
                            Rp{{ number_format($hotel->price_per_night, 0, ',', '.') }}
                            <small>/ malam</small>
                        </div>

                        <a href="{{ route('hotel.show', $hotel->slug) }}"
                           class="btn">
                            Lihat Detail Hotel
                        </a>

                    </div>
                </div>

            @empty

                <p>Belum ada hotel yang tersedia.</p>

            @endforelse

        </div>

    </section>

    <section id="tentang" style="padding:25px 0 50px;">
        <h2 class="section-title">Tentang Hotelin</h2>

        <p style="color:#758197; line-height:2;">
            Hotelin merupakan platform pemesanan hotel
            yang membantu pelanggan menemukan dan memesan
            hotel dengan mudah. Kami menyediakan informasi
            hotel, harga per malam, serta perhitungan
            biaya menginap secara otomatis.
        </p>
    </section>

</div>

@endsection
