<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Casio Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; font-family: sans-serif; }
        
        /* 1. Header tổng: Ép cứng chiều cao để mọi thứ phải canh theo */
        .navbar-main {
            background: #fff;
            border-bottom: 1px solid #eee;
            height: 80px; /* Cố định chiều cao header */
            display: flex;
            align-items: center;
        }

        .navbar-main .container {
            display: flex !important;
            flex-direction: row !important;
            align-items: center !important; /* Căn giữa tất cả theo chiều dọc */
            justify-content: space-between;
            width: 100%;
        }

        /* 2. Menu trái: Ép nằm ngang tuyệt đối */
        .nav-left-group {
            display: flex !important;
            gap: 15px;
            margin: 0;
            padding: 0;
            list-style: none;
            min-width: 200px;
        }
        .nav-left-group li a {
            text-decoration: none;
            color: #333;
            font-weight: 700;
            font-size: 13px;
            white-space: nowrap;
        }

        /* 3. Logo chính giữa: Ép dòng để không đẩy cao header */
        .logo-wrapper {
            display: flex;
            align-items: center;
            text-decoration: none;
            line-height: 1.1;
            margin: 0 20px;
        }
        .logo-wrapper span { font-size: 28px; margin-right: 8px; }
        .logo-text {
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .logo-text b {
            color: #d9534f;
            font-size: 18px;
            font-weight: 900;
            margin: 0;
        }

        /* 4. Ô Search: Ép chiều cao cố định */
        .search-container {
            flex-grow: 1;
            max-width: 350px;
            margin: 0 20px;
        }
        .search-container input {
            height: 38px !important;
            border-radius: 20px !important;
            background-color: #f1f3f5 !important;
            border: none !important;
        }

        /* 5. Cụm nút bên phải */
        .actions-right {
            display: flex;
            align-items: center;
            gap: 10px;
            min-width: 300px;
            justify-content: flex-end;
        }
        .btn-action {
            height: 38px;
            display: flex;
            align-items: center;
            font-size: 13px;
            font-weight: 600;
        }
    </style>
</head>
<body>

<nav class="navbar-main">
    <div class="container">
        
        <ul class="nav-left-group">
            <li><a href="#">THƯƠNG HIỆU</a></li>
            <li><a href="/category/nam">NAM</a></li>
            <li><a href="/category/nu">NỮ</a></li>
        </ul>

        <a href="/" class="logo-wrapper">
            <span>⌚</span>
            <div class="logo-text">
                <b>CASIO</b>
                <b>STORE</b>
            </div>
        </a>

        <div class="search-container">
            <form action="/search" method="GET" class="m-0">
                <input type="text" name="query" class="form-control px-3" placeholder="Tìm sản phẩm...">
            </form>
        </div>

        <div class="actions-right">
            <div class="d-flex align-items-center me-2">
                <span style="font-size: 16px;">👋</span>
                <span class="ms-1 fw-bold small">trungdeptrai</span>
            </div>
            
            <a href="/profile" class="btn btn-outline-primary btn-action px-3">Hồ sơ</a>
            <a href="/orders" class="btn btn-outline-dark btn-action px-3">Đơn hàng</a>
            
            <form action="/logout" method="POST" class="m-0">
                @csrf
                <button class="btn btn-danger btn-action px-3">Thoát</button>
            </form>

            <a href="/cart" class="btn btn-dark btn-action position-relative">
                🛒 <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle" style="font-size: 10px;">0</span>
            </a>
        </div>

    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>