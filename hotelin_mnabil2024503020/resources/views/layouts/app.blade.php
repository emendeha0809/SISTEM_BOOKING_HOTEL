<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Hotelin - Booking Hotel')</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #f5f7fb;
            color: #26334d;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        .navbar {
            background: white;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 12px rgba(0,0,0,.05);
        }

        .logo {
            color: #1769d2;
            font-size: 27px;
            font-weight: 800;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
            font-size: 14px;
            font-weight: 500;
        }

        .hero {
            background: linear-gradient(120deg, #0757b8, #2489ef);
            color: white;
            padding: 65px 8% 100px;
        }

        .hero h1 {
            font-size: 38px;
            max-width: 650px;
            margin-bottom: 15px;
        }

        .hero p {
            color: #e0efff;
            line-height: 1.8;
        }

        .container {
            width: 84%;
            margin: auto;
        }

        .hotel-section {
            padding: 45px 0;
        }

        .section-title {
            font-size: 25px;
            margin-bottom: 25px;
        }

        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 25px;
        }

        .hotel-card {
            background: white;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0,0,0,.06);
            transition: .3s;
        }

        .hotel-card:hover {
            transform: translateY(-5px);
        }

        .hotel-image {
            width: 100%;
            height: 230px;
            object-fit: cover;
        }

        .hotel-content {
            padding: 22px;
        }

        .hotel-content h3 {
            font-size: 19px;
            margin-bottom: 8px;
        }

        .hotel-content p {
            font-size: 13px;
            color: #758197;
            line-height: 1.7;
        }

        .hotel-price {
            margin-top: 18px;
            margin-bottom: 18px;
            color: #1769d2;
            font-size: 21px;
            font-weight: 700;
        }

        .hotel-price small {
            font-size: 12px;
            color: #8993a5;
            font-weight: 400;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            background: #1769d2;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
        }

        .btn:hover {
            background: #0d4fa7;
        }

        .detail-layout {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 30px;
            padding: 45px 0;
        }

        .panel {
            background: white;
            border-radius: 14px;
            padding: 25px;
            box-shadow: 0 4px 15px rgba(0,0,0,.04);
        }

        .detail-image {
            width: 100%;
            height: 330px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #dce2eb;
            border-radius: 8px;
            font-family: inherit;
            font-size: 13px;
        }

        .form-group input:focus {
            outline: 2px solid #b8d7ff;
            border-color: #1769d2;
        }

        .price-box {
            background: #edf5ff;
            border-radius: 10px;
            padding: 16px;
            margin: 20px 0;
        }

        .price-box h2 {
            color: #1769d2;
            margin-top: 5px;
        }

        .error {
            color: #dc2626;
            font-size: 12px;
            margin-top: 5px;
        }

        .success-card {
            max-width: 650px;
            margin: 60px auto;
            text-align: center;
        }

        .success-icon {
            font-size: 55px;
            color: #16a34a;
            margin-bottom: 15px;
        }

        .booking-info {
            text-align: left;
            margin-top: 25px;
            line-height: 2.2;
        }

        .booking-total {
            background: #edf5ff;
            padding: 18px;
            border-radius: 10px;
            margin-top: 20px;
        }

        footer {
            background: #102b50;
            color: white;
            text-align: center;
            padding: 25px;
            margin-top: 50px;
            font-size: 13px;
        }

        @media(max-width: 768px) {
            .navbar {
                padding: 15px 5%;
            }

            .nav-menu {
                gap: 12px;
                font-size: 11px;
            }

            .hero {
                padding: 45px 6%;
            }

            .hero h1 {
                font-size: 27px;
            }

            .container {
                width: 90%;
            }

            .hotel-grid,
            .detail-layout {
                grid-template-columns: 1fr;
            }

            .hotel-image {
                height: 200px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('home') }}" class="logo">HOTELIN.</a>

        <div class="nav-menu">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('home') }}#hotel">Hotel</a>
            <a href="{{ route('home') }}#tentang">Tentang</a>
        </div>
    </nav>

    @yield('content')

    <footer>
        <p>© {{ date('Y') }} Hotelin. Sistem Booking Hotel.</p>
        <p>Temukan kenyamanan menginap bersama kami.</p>
    </footer>

    @stack('scripts')

</body>
</html>
