<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Casio Store</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f8f9fa;
            font-family:sans-serif;
        }

        /* HEADER */

        .navbar-main{
            background:rgba(255,255,255,0.95);
            border-bottom:1px solid #eee;
            height:75px;
            display:flex;
            align-items:center;
            position:sticky;
            top:0;
            z-index:999;
            backdrop-filter:blur(10px);
            box-shadow:0 3px 15px rgba(0,0,0,0.04);
        }

        .navbar-main .container{
            display:flex !important;
            flex-direction:row !important;
            align-items:center !important;
            justify-content:space-between;
            height:100%;
        }

        /* LEFT */

        .nav-left-group{
            display:flex !important;
            align-items:center !important;
            gap:22px;
            margin:0;
            padding:0;
            list-style:none;
            height:100%;
        }

        .nav-left-group li{
            display:flex;
            align-items:center;
        }

        .nav-left-group li a{
            text-decoration:none;
            color:#333;
            font-weight:700;
            font-size:13px;
            white-space:nowrap;
            position:relative;
            transition:0.3s;
            letter-spacing:0.3px;
        }

        .nav-left-group li a:hover{
            color:#dc3545;
        }

        .nav-left-group li a::after{
            content:"";
            position:absolute;
            left:0;
            bottom:-6px;
            width:0;
            height:2px;
            background:#dc3545;
            transition:0.3s;
            border-radius:10px;
        }

        .nav-left-group li a:hover::after{
            width:100%;
        }

        /* LOGO */

        .logo-wrapper{
            display:flex;
            align-items:center;
            text-decoration:none;
            margin:0 30px;
            height:100%;
            transition:0.3s;
        }

        .logo-wrapper:hover{
            transform:scale(1.03);
        }

        .logo-icon{
            font-size:28px;
            margin-right:8px;
            line-height:1;
        }

        .logo-text{
            display:flex;
            flex-direction:column;
            justify-content:center;
            line-height:1;
        }

        .logo-text b{
            color:#d9534f;
            font-size:17px;
            font-weight:900;
            margin:0;
            letter-spacing:1px;
        }

        /* SEARCH */

        .search-container{
            flex-grow:1;
            max-width:340px;
            margin:0 15px;
            display:flex;
            align-items:center;
        }

        .search-container form{
            width:100%;
            margin:0;
            position:relative;
        }

        .search-container input{
            height:38px !important;
            border-radius:30px !important;
            background:#f1f3f5 !important;
            border:none !important;
            padding-left:18px !important;
            font-size:13px;
            transition:0.3s;
        }

        .search-container input:focus{
            background:#fff !important;
            box-shadow:0 0 0 4px rgba(220,53,69,0.08);
        }

        /* RIGHT */

        .actions-right{
            display:flex;
            align-items:center;
            gap:10px;
            height:100%;
        }

        .user-info{
            display:flex;
            align-items:center;
            white-space:nowrap;
            font-size:13px;
            margin-right:5px;
            background:#f1f3f5;
            padding:7px 14px;
            border-radius:30px;
            font-weight:700;
        }

        /* BUTTON */

        .btn-action{
            height:38px;
            padding:0 14px;
            font-size:13px;
            font-weight:700;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:12px;
            transition:0.3s;
        }

        .btn-action:hover{
            transform:translateY(-2px);
            box-shadow:0 6px 15px rgba(0,0,0,0.08);
        }

        /* CART */

        .cart-btn{
            position:relative;
            overflow:visible !important;
        }

        .cart-badge{
            font-size:10px;
            min-width:19px;
            height:19px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:bold;
            box-shadow:0 3px 10px rgba(255,0,0,0.3);
        }

        /* CONTAINER */

        .main-content{
            min-height:calc(100vh - 75px);
        }

    </style>

</head>

<body>

<!-- HEADER -->

<nav class="navbar-main">

    <div class="container">

        <!-- LEFT MENU -->

        <ul class="nav-left-group">

            <li>
                <a href="/">TRANG CHỦ</a>
            </li>

            <li>
                <a href="/brand/Casio">THƯƠNG HIỆU</a>
            </li>

            <li>
                <a href="/category/nam">NAM</a>
            </li>

            <li>
                <a href="/category/nu">NỮ</a>
            </li>

        </ul>

        <!-- LOGO -->

        <a href="/" class="logo-wrapper">

            <div class="logo-icon">
                ⌚
            </div>

            <div class="logo-text">
                <b>CASIO</b>
                <b>STORE</b>
            </div>

        </a>

        <!-- SEARCH -->

        <div class="search-container">

            <form action="/search" method="GET">

                <input type="text"
                       name="query"
                       class="form-control"
                       placeholder="Tìm sản phẩm...">

            </form>

        </div>

        <!-- RIGHT -->

        <div class="actions-right">

            @auth

                <div class="user-info">

                    👋 {{ auth()->user()->name }}

                </div>

                <a href="{{ route('profile.edit') }}"
                   class="btn btn-outline-primary btn-action">

                    Hồ sơ

                </a>

                <a href="{{ route('orders') }}"
                   class="btn btn-outline-secondary btn-action">

                    Đơn hàng

                </a>

                @if(Auth::user()->role == 'admin')

                    <a href="/admin"
                       class="btn btn-dark btn-action">

                        ADMIN

                    </a>

                @endif

                <form action="{{ route('logout') }}"
                      method="POST"
                      class="m-0">

                    @csrf

                    <button class="btn btn-danger btn-action">

                        Thoát

                    </button>

                </form>

            @else

                <a href="{{ route('login') }}"
                   class="btn btn-outline-primary btn-action">

                    Đăng nhập

                </a>

                <a href="{{ route('register') }}"
                   class="btn btn-success btn-action">

                    Đăng ký

                </a>

            @endauth

            <!-- CART -->

            <a href="/cart"
               class="btn btn-dark btn-action cart-btn">

                🛒

                <span class="badge bg-danger rounded-circle position-absolute top-0 start-100 translate-middle cart-badge">

                    {{ is_array(session('cart')) ? count(session('cart')) : 0 }}

                </span>

            </a>

        </div>

    </div>

</nav>

<!-- CONTENT -->

<div class="container mt-4 main-content">

    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>