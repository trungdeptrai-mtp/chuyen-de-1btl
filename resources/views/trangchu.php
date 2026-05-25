<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRUNGDTRAI ĐỒNG HỒ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#E3F5FF;
            font-family:Arial, Helvetica, sans-serif;
        }

        .top-header{
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid #eee;
            position:sticky;
            top:0;
            z-index:999;
            backdrop-filter:blur(10px);
            box-shadow:0 2px 10px rgba(0,0,0,0.05);
        }

        .menu a{
            text-decoration:none;
            color:#333;
            margin-right:20px;
            font-weight:600;
            position:relative;
            transition:0.3s;
        }

        .menu a::after{
            content:'';
            position:absolute;
            left:0;
            bottom:-5px;
            width:0%;
            height:2px;
            background:red;
            transition:0.3s;
        }

        .menu a:hover::after{
            width:100%;
        }

        .menu a:hover{
            color:red;
        }

        .search-box input{
            border-radius:30px;
            border:none;
            background:#f1f1f1;
            padding-left:15px;
            width:220px;
            height:42px;
            transition:0.3s;
        }

        .search-box input:focus{
            background:white;
            box-shadow:0 0 0 4px rgba(220,53,69,0.15);
        }

        /* SLIDER */

        .carousel{
            margin-top:10px;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,0.15);
        }

        .carousel img{
            height:500px;
            object-fit:cover;
            filter:brightness(0.8);
        }

        .carousel-caption{
            bottom:100px;
        }

        .hero-title{
            font-size:60px;
            font-weight:900;
            text-shadow:0 5px 20px rgba(0,0,0,0.5);
        }

        .hero-text{
            font-size:18px;
            letter-spacing:2px;
        }

        /* PRODUCT */

        .product-card{
            background:white;
            border-radius:20px;
            overflow:hidden;
            transition:0.35s;
            height:100%;
            position:relative;
            border:1px solid #eee;
        }

        .product-card:hover{
            transform:translateY(-8px);
            box-shadow:0 15px 35px rgba(0,0,0,0.18);
        }

        .product-card img{
            width:100%;
            height:260px;
            object-fit:cover;
            transition:0.5s;
        }

        .product-card:hover img{
            transform:scale(1.06);
        }

        .badge-hot{
            position:absolute;
            top:12px;
            left:12px;
            background:#dc3545;
            color:white;
            font-size:11px;
            padding:6px 10px;
            border-radius:20px;
            z-index:2;
            font-weight:bold;
            box-shadow:0 5px 10px rgba(220,53,69,0.3);
        }

        .product-body{
            padding:18px;
        }

        .product-name{
            font-weight:bold;
            min-height:48px;
            font-size:17px;
        }

        .price{
            color:red;
            font-size:24px;
            font-weight:bold;
        }

        .btn-add{
            border:2px solid #198754;
            color:#198754;
            border-radius:12px;
            padding:10px;
            text-decoration:none;
            display:block;
            text-align:center;
            font-size:14px;
            transition:0.3s;
            font-weight:600;
        }

        .btn-add:hover{
            background:#198754;
            color:white;
            transform:translateY(-2px);
        }

        .btn-buy{
            background:#dc3545;
            color:white;
            border-radius:12px;
            padding:10px;
            text-decoration:none;
            display:block;
            text-align:center;
            font-size:14px;
            transition:0.3s;
            font-weight:600;
            box-shadow:0 5px 12px rgba(220,53,69,0.2);
        }

        .btn-buy:hover{
            background:#bb2d3b;
            color:white;
            transform:translateY(-2px);
        }

        .cart-count{
            position:absolute;
            top:-5px;
            right:-10px;
            background:red;
            color:white;
            border-radius:50%;
            font-size:11px;
            padding:2px 6px;
            font-weight:bold;
        }

        /* TITLE */

        .section-title{
            position:relative;
            display:inline-block;
            font-weight:900;
        }

        .section-title::after{
            content:'';
            position:absolute;
            left:0;
            bottom:-10px;
            width:70%;
            height:4px;
            border-radius:10px;
            background:linear-gradient(to right,#dc3545,#ff7676);
        }

        /* PAGINATION */

        .pagination{
            justify-content:center;
            gap:8px;
        }

        .page-link{
            border:none;
            color:#333;
            border-radius:10px !important;
            padding:10px 16px;
            font-weight:600;
            transition:0.3s;
        }

        .page-link:hover{
            background:#dc3545;
            color:white;
        }

        .active>.page-link{
            background:#dc3545 !important;
            color:white !important;
            box-shadow:0 5px 12px rgba(220,53,69,0.3);
        }

        /* FOOTER */

        footer{
            background:#111;
            color:white;
            margin-top:80px;
            padding:70px 0;
            position:relative;
            overflow:hidden;
        }

        footer::before{
            content:'';
            position:absolute;
            width:300px;
            height:300px;
            background:rgba(220,53,69,0.08);
            border-radius:50%;
            top:-100px;
            left:-100px;
        }

        footer::after{
            content:'';
            position:absolute;
            width:250px;
            height:250px;
            background:rgba(255,255,255,0.04);
            border-radius:50%;
            bottom:-100px;
            right:-50px;
        }

        .footer-logo{
            font-size:36px;
            font-weight:900;
            letter-spacing:2px;
        }

        .footer-social a{
            width:45px;
            height:45px;
            background:#222;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            margin:0 6px;
            color:white;
            text-decoration:none;
            transition:0.3s;
        }

        .footer-social a:hover{
            background:#dc3545;
            transform:translateY(-4px);
        }

    </style>

</head>

<body>

<!-- HEADER -->

<div class="top-header py-3">

    <div class="container d-flex justify-content-between align-items-center">

        <div class="menu">
            <a href="/">TRANG CHỦ</a>
            <a href="/brand/Casio">CASIO</a>
            <a href="/category/nam">NAM</a>
            <a href="/category/nu">NỮ</a>
        </div>

        <div class="fw-bold fs-2 text-danger">
            ⌚ TRUNGDTRAI
        </div>

        <div class="d-flex align-items-center gap-3">

            <form action="/search" method="GET" class="search-box">
                <input type="text"
                       name="query"
                       placeholder="Tìm sản phẩm..."
                       class="form-control">
            </form>

            @auth

                <span class="fw-bold">
                    👋 {{ auth()->user()->name }}
                </span>

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-outline-primary btn-sm">
                    Hồ sơ
                </a>

                <a href="{{ route('orders') }}"
                   class="btn btn-outline-secondary btn-sm">
                    Đơn hàng
                </a>

                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button class="btn btn-danger btn-sm">
                        Đăng xuất
                    </button>

                </form>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-outline-primary btn-sm">
                    Đăng nhập
                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-success btn-sm">
                    Đăng ký
                </a>

            @endauth

            <a href="/cart"
               class="btn btn-dark position-relative">

                🛒

                <span class="cart-count">
                    {{ is_array(session('cart')) ? count(session('cart')) : 0 }}
                </span>

            </a>

        </div>

    </div>

</div>

<!-- SLIDER -->

<div class="container mt-3">

<div id="slider"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="3000"
     data-bs-touch="true"
     data-bs-pause="false">

    <div class="carousel-inner">

        <div class="carousel-item active">

            <img src="https://cdn.bongdaplus.vn/Assets/Media/2023/08/10/95/ronaldo%20480x270.jpg"
                 class="d-block w-100">

            <div class="carousel-caption">

                <div class="hero-title">
                    CRISTIANO RONALDO
                </div>

                <div class="hero-text">
                    ĐẠI SỨ THƯƠNG HIỆU TRUNGDTRAI TẠI VIỆT NAM
                </div>

            </div>

        </div>

        <div class="carousel-item">

            <img src="https://bizweb.dktcdn.net/100/175/988/articles/cristiano-ronaldo-jacob-and-co-watch.jpeg?v=1669369141883"
                 class="d-block w-100">

            <div class="carousel-caption">

                <div class="hero-title">
                    G-SHOCK STYLE
                </div>

                <div class="hero-text">
                    MẠNH MẼ - CÁ TÍNH - BỀN BỈ
                </div>

            </div>

        </div>

        <div class="carousel-item">

            <img src="https://cafebiz.cafebizcdn.vn/162123310254002176/2023/1/27/dong-ho-cr7-1971-1674785053288-16747850534621819035321.jpg"
                 class="d-block w-100">

            <div class="carousel-caption">

                <div class="hero-title">
                    LUXURY TRUNGDTRAI
                </div>

                <div class="hero-text">
                    THỜI GIAN KHÔNG CHỈ ĐỂ XEM
                </div>

            </div>

        </div>

    </div>

    <button class="carousel-control-prev"
            data-bs-target="#slider"
            data-bs-slide="prev">

        <span class="carousel-control-prev-icon"></span>

    </button>

    <button class="carousel-control-next"
            data-bs-target="#slider"
            data-bs-slide="next">

        <span class="carousel-control-next-icon"></span>

    </button>

</div>

</div>

<!-- PRODUCTS -->

<div class="container mt-5">

    <!-- ĐỒNG HỒ ĐEO TAY -->

    <h2 class="section-title mb-5">
        🔥 Đồng Hồ Đeo Tay
    </h2>

    <div class="row">

        @forelse($products as $p)

            <div class="col-md-3 mb-4">

                <div class="product-card">

                    <div class="badge-hot">
                        HOT
                    </div>

                    <a href="/product/{{ $p->id }}">

                        <img src="{{ $p->image }}"
                             alt="{{ $p->name }}">

                    </a>

                    <div class="product-body">

                        <div class="product-name">
                            {{ $p->name }}
                        </div>

                        <div class="text-muted small mb-2">
                            {{ $p->brand }}
                        </div>

                        <div class="price mb-3">
                            {{ number_format($p->price) }} đ
                        </div>

                        <div class="row g-2">

                            <div class="col-6">

                                <a href="/add-to-cart/{{ $p->id }}"
                                   class="btn-add">

                                    Thêm giỏ

                                </a>

                            </div>

                            <div class="col-6">

                                <a href="/buy-now/{{ $p->id }}"
                                   class="btn-buy">

                                    Mua ngay

                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-danger">
                    Không có sản phẩm
                </div>

            </div>

        @endforelse

    </div>

    <!-- PAGINATION ĐEO TAY -->

    <div class="mt-4 d-flex justify-content-center">
        {{ $products->links() }}
    </div>

</div>

<!-- ĐỒNG HỒ TREO TƯỜNG -->

<div class="container mt-5">

    <h2 class="section-title mb-5">
        🕰 Đồng hồ treo tường
    </h2>

    <div class="row">

        @forelse($wallClocks as $p)

            <div class="col-md-3 mb-4">

                <div class="product-card">

                    <div class="badge-hot"
                         style="background:#111;">
                        TREO TƯỜNG
                    </div>

                    <a href="/product/{{ $p->id }}">

                        <img src="{{ $p->image }}"
                             alt="{{ $p->name }}">

                    </a>

                    <div class="product-body">

                        <div class="product-name">
                            {{ $p->name }}
                        </div>

                        <div class="text-muted small mb-2">
                            {{ $p->brand }}
                        </div>

                        <div class="price mb-3">
                            {{ number_format($p->price) }} đ
                        </div>

                        <div class="row g-2">

                            <div class="col-6">

                                <a href="/add-to-cart/{{ $p->id }}"
                                   class="btn-add">
                                    Thêm giỏ
                                </a>

                            </div>

                            <div class="col-6">

                                <a href="/buy-now/{{ $p->id }}"
                                   class="btn-buy">
                                    Mua ngay
                                </a>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-dark">
                    Chưa có đồng hồ treo tường
                </div>

            </div>

        @endforelse

    </div>

    <!-- PAGINATION TREO TƯỜNG -->

    <div class="mt-4 d-flex justify-content-center">
        {{ $wallClocks->links() }}
    </div>

</div>

<!-- ADMIN -->

@if(Auth::check() && Auth::user()->role == 'admin')

<div class="container mt-3">

    <a href="/admin" class="btn btn-dark">
        ADMIN PANEL
    </a>

</div>

@endif

<!-- FOOTER -->

<footer>

    <div class="container text-center position-relative">

        <div class="footer-logo mb-3">
            ⌚ CASIO STORE
        </div>

        <p class="text-secondary mb-4">
            Đồng hồ chính hãng - Sang trọng - Đẳng cấp doanh nhân
        </p>

        <div class="footer-social">

            <a href="#">F</a>
            <a href="#">I</a>
            <a href="#">T</a>
            <a href="#">Y</a>

        </div>

        <hr class="border-secondary my-4">

        <div class="row text-start">

            <!-- SHOWROOM 1 -->

            <div class="col-md-3 mb-3">

                <h6 class="text-white fw-bold">
                    SHOWROOM 1
                </h6>

                <p class="text-secondary small mb-1">
                    📍 PHÚ DIỄN, BẮC TỪ LIÊM, HÀ NỘI
                </p>

                <p class="text-secondary small mb-1">
                    📞 0337738101
                </p>

                <p class="text-secondary small">
                    ⏰ 8h30 - 21h30
                </p>

            </div>

            <!-- SHOWROOM 2 -->

            <div class="col-md-3 mb-3">

                <h6 class="text-white fw-bold">
                    SHOWROOM 2
                </h6>

                <p class="text-secondary small mb-1">
                    📍 XUÂN THỦY, CẦU GIẤY, HÀ NỘI
                </p>

                <p class="text-secondary small mb-1">
                    📞 0337738101
                </p>

                <p class="text-secondary small">
                    ⏰ 8h30 - 21h30
                </p>

            </div>

            <!-- SHOWROOM 3 -->

            <div class="col-md-3 mb-3">

                <h6 class="text-white fw-bold">
                    SHOWROOM 3
                </h6>

                <p class="text-secondary small mb-1">
                    📍 ĐÔNG DƯ, GIA LÂM, HÀ NỘI
                </p>

                <p class="text-secondary small mb-1">
                    📞 0337738101
                </p>

                <p class="text-secondary small">
                    ⏰ 8h30 - 21h30
                </p>

            </div>

            <!-- ABOUT -->

            <div class="col-md-3 mb-3">

                <h6 class="text-white fw-bold">
                    VỀ CHÚNG TÔI
                </h6>

                <p class="text-secondary small">
                    Shop Đồng Hồ Chính Hãng từ 2004
                </p>

                <div class="d-flex gap-2 mt-2">

                    <a href="#" class="text-white">📘</a>
                    <a href="#" class="text-white">▶️</a>
                    <a href="#" class="text-white">📷</a>
                    <a href="#" class="text-white">🎵</a>

                </div>

                <p class="text-secondary small mt-2">
                    HOTLINE: 0337738101
                </p>

            </div>

        </div>

        <!-- SUPPORT -->

        <div class="row mt-4 text-start">

            <div class="col-md-4 mb-2">

                <h6 class="text-white">
                    HỖ TRỢ KHÁCH HÀNG
                </h6>

                <p class="text-secondary small mb-1">
                    Hướng dẫn mua hàng
                </p>

                <p class="text-secondary small mb-1">
                    Phương thức thanh toán
                </p>

                <p class="text-secondary small">
                    Phương thức vận chuyển
                </p>

            </div>

            <div class="col-md-4 mb-2">

                <h6 class="text-white">
                    CHÍNH SÁCH
                </h6>

                <p class="text-secondary small mb-1">
                    Bảo hành
                </p>

                <p class="text-secondary small mb-1">
                    Đổi trả 7 ngày
                </p>

                <p class="text-secondary small">
                    Bảo mật thông tin
                </p>

            </div>

            <div class="col-md-4 mb-2">

                <h6 class="text-white">
                    LIÊN HỆ
                </h6>

                <p class="text-secondary small mb-1">
                    Email: cristrungnguyen55@gmail.com
                </p>

                <p class="text-secondary small">
                    Zalo / Hotline: 0337738101
                </p>

            </div>

        </div>

        <div class="mt-4 text-secondary small">
            © 2026 Casio Store. All rights reserved.
        </div>

    </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>