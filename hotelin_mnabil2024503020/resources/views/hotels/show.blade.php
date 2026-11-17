@extends('layouts.app')

@section('title', $hotel->name . ' - Hotelin')

@section('content')

<div class="container">

    <div class="detail-layout">

        <!-- Informasi Hotel -->
        <div class="panel">

            <img
                src="{{ $hotel->image && filter_var($hotel->image, FILTER_VALIDATE_URL) ? $hotel->image : asset('images/' . ($hotel->image ?? '')) }}"
                alt="{{ $hotel->name }}"
                class="detail-image"
                onerror="this.src='https://placehold.co/900x500/eaf2fc/1769d2?text=Hotelin'">

            <h1>{{ $hotel->name }}</h1>

            <p style="color:#758197; margin:10px 0;">
                {{ $hotel->address }}
            </p>

            <hr style="border:0; border-top:1px solid #eee; margin:20px 0;">

            <h3>Deskripsi Hotel</h3>

            <p style="color:#758197; line-height:2; margin-top:10px;">
                {{ $hotel->description }}
            </p>

            <h3 style="margin-top:25px;">Fasilitas Hotel</h3>

            <p style="color:#758197; margin-top:10px;">
                {{ $hotel->facilities }}
            </p>

            <div class="price-box">
                <p>Harga per malam</p>

                <h2>
                    Rp{{ number_format($hotel->price_per_night, 0, ',', '.') }}
                </h2>
            </div>

            <a href="{{ route('home') }}" class="btn">
                Kembali ke Beranda
            </a>

        </div>

        <!-- Form Booking -->
        <div class="panel">

            <h2 style="margin-bottom:8px;">
                Form Pemesanan
            </h2>

            <p style="font-size:13px; color:#758197; margin-bottom:25px;">
                Lengkapi data berikut untuk memesan hotel.
            </p>

            @if($errors->any())
                <div style="background:#fee2e2; padding:15px; border-radius:8px; margin-bottom:20px;">
                    <strong style="color:#b91c1c;">Periksa kembali data:</strong>

                    @foreach($errors->all() as $error)
                        <p class="error">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('booking.store') }}" method="POST">

                @csrf

                <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                <div class="form-group">
                    <label>Nama Pemesan</label>

                    <input
                        type="text"
                        name="customer_name"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('customer_name') }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Tanggal Check-in</label>

                    <input
                        type="date"
                        name="checkin_date"
                        id="checkin"
                        min="{{ date('Y-m-d') }}"
                        value="{{ old('checkin_date') }}"
                        required>
                </div>

                <div class="form-group">
                    <label>Tanggal Check-out</label>

                    <input
                        type="date"
                        name="checkout_date"
                        id="checkout"
                        min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                        value="{{ old('checkout_date') }}"
                        required>
                </div>

                <div class="price-box">

                    <p>Harga per malam</p>

                    <strong>
                        Rp{{ number_format($hotel->price_per_night, 0, ',', '.') }}
                    </strong>

                    <hr style="border:0; border-top:1px solid #d6e5f7; margin:12px 0;">

                    <p>Jumlah malam:
                        <strong id="total-nights">0</strong>
                    </p>

                    <h2 id="total-price">Rp0</h2>

                    <small style="color:#758197;">
                        Estimasi total pembayaran
                    </small>

                </div>

                <button type="submit" class="btn" style="width:100%;">
                    Pesan Sekarang
                </button>

            </form>

        </div>

    </div>

</div>

@endsection

@push('scripts')

<script>
    const checkin = document.getElementById('checkin');
    const checkout = document.getElementById('checkout');

    const totalNights = document.getElementById('total-nights');
    const totalPrice = document.getElementById('total-price');

    const pricePerNight = {{ (float) $hotel->price_per_night }};

    function calculatePrice() {

        if (!checkin.value || !checkout.value) {
            totalNights.textContent = 0;
            totalPrice.textContent = 'Rp0';
            return;
        }

        const start = new Date(checkin.value + 'T00:00:00');
        const end = new Date(checkout.value + 'T00:00:00');

        const difference = end - start;
        const nights = difference / (1000 * 60 * 60 * 24);

        if (nights <= 0) {
            totalNights.textContent = 0;
            totalPrice.textContent = 'Rp0';
            return;
        }

        const total = nights * pricePerNight;

        totalNights.textContent = nights;

        totalPrice.textContent = 'Rp' +
            new Intl.NumberFormat('id-ID').format(total);
    }

    function updateCheckoutMin() {
        if (checkin.value) {
            const nextDay = new Date(checkin.value + 'T00:00:00');

            nextDay.setDate(nextDay.getDate() + 1);

            const minDate = [
                nextDay.getFullYear(),
                String(nextDay.getMonth() + 1).padStart(2, '0'),
                String(nextDay.getDate()).padStart(2, '0')
            ].join('-');

            checkout.min = minDate;

            if (checkout.value && checkout.value < minDate) {
                checkout.value = '';
            }
        }

        calculatePrice();
    }

    checkin.addEventListener('change', updateCheckoutMin);
    checkout.addEventListener('change', calculatePrice);

    updateCheckoutMin();
</script>

@endpush
