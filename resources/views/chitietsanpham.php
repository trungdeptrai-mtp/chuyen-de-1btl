<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $product->name }} - Casio Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/combine/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css">

    <style>

        body{
            font-family:'Inter',sans-serif;
            background:#f5f7fb;
            overflow-x:hidden;
        }

        /* NAVBAR */

        .navbar{
            background:rgba(255,255,255,0.95);
            backdrop-filter:blur(12px);
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .navbar-brand{
            letter-spacing:1px;
        }

        /* PRODUCT */

        .product-gallery{
            background:white;
            border-radius:25px;
            padding:25px;
            position:sticky;
            top:100px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .main-img{
            width:100%;
            border-radius:18px;
            object-fit:contain;
            transition:0.5s;
        }

        .product-gallery:hover .main-img{
            transform:scale(1.05);
        }

        .img-badge{
            position:absolute;
            top:20px;
            left:20px;
            background:#ff4757;
            color:white;
            padding:8px 16px;
            border-radius:50px;
            font-size:12px;
            font-weight:bold;
            box-shadow:0 10px 20px rgba(255,71,87,0.3);
            z-index:5;
        }

        /* TITLE */

        .badge-sale{
            background:linear-gradient(45deg,#ff4757,#ff6b81);
            color:white;
            padding:8px 18px;
            border-radius:50px;
            font-weight:700;
            font-size:0.75rem;
            letter-spacing:1px;
            box-shadow:0 10px 20px rgba(255,71,87,0.25);
        }

        .product-title{
            font-size:42px;
            font-weight:800;
            line-height:1.2;
        }

        .price-tag{
            color:#ff4757;
            font-size:2.6rem;
            font-weight:800;
        }

        .old-price{
            font-size:18px;
        }

        /* RATING */

        .rating-box{
            display:flex;
            align-items:center;
            gap:8px;
            margin-bottom:25px;
        }

        .rating-stars{
            color:#ffc107;
        }

        /* CARD */

        .info-card{
            background:white;
            border:none;
            border-radius:22px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,0.06);
        }

        /* BUTTON */

        .btn-add-large{
            background:linear-gradient(45deg,#2ed573,#1abc9c);
            color:white;
            border:none;
            padding:16px;
            border-radius:16px;
            font-weight:700;
            transition:0.3s;
            box-shadow:0 10px 20px rgba(46,213,115,0.25);
        }

        .btn-add-large:hover{
            transform:translateY(-3px);
            color:white;
            box-shadow:0 15px 25px rgba(46,213,115,0.35);
        }

        .btn-favorite{
            border-radius:16px;
            font-weight:600;
            transition:0.3s;
        }

        .btn-favorite:hover{
            transform:translateY(-3px);
        }

        /* BENEFITS */

        .benefit-box{
            background:white;
            border-radius:18px;
            padding:18px;
            display:flex;
            align-items:center;
            gap:15px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .benefit-icon{
            width:50px;
            height:50px;
            background:#f1f3f5;
            border-radius:50%;
            display:flex;
            align-items:center;
            justify-content:center;
            font-size:22px;
            color:#0d6efd;
        }

        /* TABLE */

        .spec-table{
            background:white;
            border-radius:18px;
            overflow:hidden;
            box-shadow:0 10px 25px rgba(0,0,0,0.05);
        }

        .spec-table th{
            width:35%;
            background:#f8f9fa;
            color:#6c757d;
            font-weight:600;
        }

        /* RELATED */

        .related-card{
            border:none;
            border-radius:20px;
            overflow:hidden;
            transition:0.35s;
            box-shadow:0 8px 20px rgba(0,0,0,0.06);
        }

        .related-card:hover{
            transform:translateY(-8px);
            box-shadow:0 15px 30px rgba(0,0,0,0.12);
        }

        .related-card img{
            height:240px;
            object-fit:cover;
            transition:0.5s;
        }

        .related-card:hover img{
            transform:scale(1.05);
        }

        .btn-view{
            border-radius:12px;
            font-weight:600;
        }

        /* FOOTER */

        footer{
            background:white;
            position:relative;
        }

        .footer-logo{
            font-size:28px;
            font-weight:800;
            color:#0d6efd;
        }

        /* BREADCRUMB */

        .breadcrumb{
            background:white;
            padding:14px 20px;
            border-radius:14px;
            box-shadow:0 5px 15px rgba(0,0,0,0.04);
        }

        .breadcrumb-item a{
            text-decoration:none;
            color:#6c757d;
            font-weight:500;
        }

        .breadcrumb-item a:hover{
            color:#0d6efd;
        }

    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top">

    <div class="container">

        <a class="navbar-brand fw-bold text-primary fs-3"
           href="/">
            ⌚ CASIO STORE
        </a>

        <div class="ms-auto d-flex align-items-center gap-3">

            <a href="/"
               class="btn btn-light rounded-pill px-4">
                Trang chủ
            </a>

            <a href="/cart"
               class="btn btn-dark position-relative fw-bold px-4 rounded-pill">

                🛒 GIỎ HÀNG

                <span class="cart-count"
                      style="position:absolute;top:-8px;right:-10px;background:#ff4757;color:white;border-radius:50%;padding:2px 7px;font-size:11px;">

                    {{ is_array(session('cart')) ? count(session('cart')) : 0 }}

                </span>

            </a>

        </div>

    </div>

</nav>

<!-- MAIN -->

<main class="container my-5">

    <!-- BREADCRUMB -->

    <nav aria-label="breadcrumb" class="mb-4">

        <ol class="breadcrumb">

            <li class="breadcrumb-item">
                <a href="/">Trang chủ</a>
            </li>

            <li class="breadcrumb-item">
                <a href="#">Đồng hồ Casio</a>
            </li>

            <li class="breadcrumb-item active text-truncate">
                {{ $product->name }}
            </li>

        </ol>

    </nav>

    <!-- PRODUCT -->

    <div class="row g-5">

        <!-- IMAGE -->

        <div class="col-lg-6">

            <div class="product-gallery">

                <div class="img-badge">
                    🔥 HOT SALE
                </div>

                <img src="{{ $product->image }}"
                     alt="{{ $product->name }}"
                     class="main-img">

            </div>

        </div>

        <!-- INFO -->

        <div class="col-lg-6">

            <div class="ps-lg-3">

                <span class="badge-sale mb-3 d-inline-block text-uppercase">
                    Chính hãng Casio
                </span>

                <h1 class="product-title mb-3">
                    {{ $product->name }}
                </h1>

                <!-- RATING -->

                <div class="rating-box">

                    <div class="rating-stars">
                        ★★★★★
                    </div>

                    <div class="text-muted">
                        4.9/5 • 1.2k đánh giá
                    </div>

                </div>

                <!-- PRICE -->

                <div class="d-flex align-items-center mb-4">

                    <div class="price-tag me-3">
                        {{ number_format($product->price) }}đ
                    </div>

                    <div class="text-muted text-decoration-line-through old-price">
                        {{ number_format($product->price * 1.2) }}đ
                    </div>

                </div>

                <!-- BENEFITS -->

                <div class="row g-3 mb-4">

                    <div class="col-md-6">

                        <div class="benefit-box">

                            <div class="benefit-icon">
                                <i class="bi bi-truck"></i>
                            </div>

                            <div>
                                <div class="fw-bold">Miễn phí ship</div>
                                <small class="text-muted">Toàn quốc</small>
                            </div>

                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="benefit-box">

                            <div class="benefit-icon">
                                <i class="bi bi-shield-check"></i>
                            </div>

                            <div>
                                <div class="fw-bold">Bảo hành 5 năm</div>
                                <small class="text-muted">Chính hãng</small>
                            </div>

                        </div>

                    </div>

                </div>

                <!-- DESCRIPTION -->

                <div class="card info-card mb-4">

                    <div class="card-body p-4">

                        <h5 class="fw-bold mb-3">
                            Mô tả sản phẩm
                        </h5>

                        <p class="text-secondary"
                           style="line-height:1.9;">

                            {{ $product->description }}

                            <br><br>

                            Dòng sản phẩm Casio Standard mang đến sự bền bỉ tuyệt đối cùng thiết kế tinh tế, phù hợp cho cả công việc và các hoạt động thể thao ngoài trời. Với độ chính xác cao và khả năng chống nước vượt trội, đây là lựa chọn hàng đầu của phái mạnh.

                        </p>

                    </div>

                </div>

                <!-- BUTTONS -->

                <div class="row g-3 mb-5">

                    <div class="col-md-8">

                        <a href="/add-to-cart/{{ $product->id }}"
                           class="btn btn-add-large w-100 fs-5">

                            <i class="bi bi-cart-plus me-2"></i>

                            THÊM VÀO GIỎ HÀNG

                        </a>

                    </div>

                    <div class="col-md-4">

                        <button class="btn btn-outline-dark btn-favorite w-100 h-100">

                            <i class="bi bi-heart-fill text-danger me-1"></i>

                            Yêu thích

                        </button>

                    </div>

                </div>

                <!-- SPECS -->

                <h5 class="fw-bold mb-3">
                    Thông số kỹ thuật
                </h5>

                <table class="table spec-table border">

                    <tbody>

                        <tr>
                            <th>Vật liệu vỏ</th>
                            <td>Thép không gỉ / Nhôm</td>
                        </tr>

                        <tr>
                            <th>Dây đeo</th>
                            <td>Dây đeo bằng nhựa cao cấp</td>
                        </tr>

                        <tr>
                            <th>Mặt kính</th>
                            <td>Mặt kính khoáng (Mineral Glass)</td>
                        </tr>

                        <tr>
                            <th>Chống nước</th>
                            <td>100 mét (10 Bar)</td>
                        </tr>

                        <tr>
                            <th>Kích thước vỏ</th>
                            <td>51.9 × 45.7 × 12.1 mm</td>
                        </tr>

                        <tr>
                            <th>Tuổi thọ pin</th>
                            <td>Xấp xỉ 3 năm (SR920SW)</td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- RELATED -->

    <div class="mt-5 pt-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h3 class="fw-bold">
                🔥 Sản phẩm liên quan
            </h3>

            <a href="/"
               class="btn btn-outline-primary rounded-pill px-4">
                Xem thêm
            </a>

        </div>

        <div class="row g-4">

            @foreach($related as $rp)

            <div class="col-6 col-md-3">

                <div class="card related-card h-100">

                    <img src="{{ $rp->image }}"
                         class="card-img-top"
                         alt="{{ $rp->name }}">

                    <div class="card-body text-center">

                        <h6 class="fw-bold text-truncate">
                            {{ $rp->name }}
                        </h6>

                        <div class="text-muted small mb-2">
                            {{ $rp->brand }}
                        </div>

                        <p class="text-danger fw-bold">
                            {{ number_format($rp->price) }}đ
                        </p>

                        <a href="/product/{{ $rp->id }}"
                           class="btn btn-outline-primary btn-view w-100">

                            Xem ngay

                        </a>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</main>

<!-- FOOTER -->

<footer class="py-5 border-top mt-5">

    <div class="container text-center">

        <div class="footer-logo mb-2">
            ⌚ CASIO STORE
        </div>

        <p class="text-muted">
            Đồng hồ chính hãng - Sang trọng - Đẳng cấp doanh nhân
        </p>

        <div class="mt-4">

            <button class="btn btn-dark rounded-circle me-2">
                <i class="bi bi-facebook"></i>
            </button>

            <button class="btn btn-danger rounded-circle me-2">
                <i class="bi bi-instagram"></i>
            </button>

            <button class="btn btn-primary rounded-circle">
                <i class="bi bi-tiktok"></i>
            </button>

        </div>

        <div class="mt-4 text-muted small">
            © 2026 Casio Store. All rights reserved.
        </div>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>