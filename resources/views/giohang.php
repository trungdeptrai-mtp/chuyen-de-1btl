<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giỏ hàng | Luxury Watch</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
            font-family:Arial, Helvetica, sans-serif;
        }

        a{
            text-decoration:none;
        }

        /* HEADER */
        .cart-header{
            background:#111;
            padding:18px 0;
            color:#fff;
            margin-bottom:40px;
            box-shadow:0 5px 20px rgba(0,0,0,0.1);
        }

        .logo{
            font-size:28px;
            font-weight:bold;
            letter-spacing:2px;
        }

        .logo span{
            color:#ff4d4d;
        }

        /* CART ITEM */
        .cart-item{
            background:#fff;
            border-radius:20px;
            padding:18px;
            margin-bottom:20px;
            display:flex;
            align-items:center;
            gap:20px;
            transition:0.3s;
            border:1px solid #eee;
        }

        .cart-item:hover{
            transform:translateY(-4px);
            box-shadow:0 15px 35px rgba(0,0,0,0.08);
        }

        .cart-img{
            width:110px;
            height:110px;
            object-fit:cover;
            border-radius:16px;
            background:#f1f1f1;
        }

        .cart-name{
            font-size:18px;
            font-weight:700;
            margin-bottom:5px;
        }

        .cart-brand{
            color:#999;
            font-size:13px;
            text-transform:uppercase;
            letter-spacing:1px;
        }

        .cart-price{
            color:#ff4d4d;
            font-size:18px;
            font-weight:bold;
            margin-top:8px;
        }

        /* QUANTITY */
        .qty-box{
            display:flex;
            align-items:center;
            border:1px solid #ddd;
            border-radius:12px;
            overflow:hidden;
            background:#fafafa;
        }

        .qty-btn{
            width:40px;
            height:40px;
            border:none;
            background:#f5f5f5;
            font-size:18px;
            font-weight:bold;
            color:#333;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .qty-btn:hover{
            background:#111;
            color:#fff;
        }

        .qty-number{
            width:50px;
            text-align:center;
            font-weight:bold;
        }

        /* TOTAL */
        .item-total{
            font-size:18px;
            font-weight:bold;
            color:#e60023;
            min-width:140px;
            text-align:right;
        }

        /* DELETE */
        .delete-btn{
            width:42px;
            height:42px;
            border-radius:50%;
            border:none;
            background:#fff0f0;
            color:#ff4d4d;
            font-size:18px;
            transition:0.3s;
        }

        .delete-btn:hover{
            background:#ff4d4d;
            color:#fff;
        }

        /* CHECKOUT */
        .checkout-box{
            background:#fff;
            border-radius:24px;
            padding:30px;
            position:sticky;
            top:20px;
            border:1px solid #eee;
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .checkout-title{
            font-size:24px;
            font-weight:bold;
            margin-bottom:25px;
        }

        .summary-row{
            display:flex;
            justify-content:space-between;
            margin-bottom:15px;
            color:#666;
        }

        .grand-total{
            font-size:34px;
            font-weight:bold;
            color:#ff1f43;
        }

        .checkout-btn{
            height:55px;
            border:none;
            border-radius:14px;
            background:linear-gradient(135deg,#ff4d4d,#ff0033);
            color:#fff;
            font-weight:bold;
            width:100%;
            margin-top:20px;
            transition:0.3s;
        }

        .checkout-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 20px rgba(255,0,51,0.3);
        }

        .continue-btn{
            height:50px;
            border-radius:14px;
            width:100%;
            margin-top:12px;
            font-weight:600;
        }

        .clear-btn{
            height:50px;
            border-radius:14px;
            width:100%;
            margin-top:12px;
            font-weight:600;
        }

        /* EMPTY */
        .empty-cart{
            background:#fff;
            padding:70px;
            border-radius:24px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
        }

        .empty-cart img{
            width:140px;
            opacity:0.6;
        }

        .empty-cart h3{
            margin-top:20px;
            font-weight:bold;
        }

        .empty-cart p{
            color:#888;
        }

        .shop-btn{
            margin-top:20px;
            padding:14px 35px;
            border:none;
            border-radius:14px;
            background:#111;
            color:#fff;
            font-weight:bold;
        }

        .shop-btn:hover{
            background:#ff4d4d;
        }

        @media(max-width:768px){

            .cart-item{
                flex-direction:column;
                align-items:flex-start;
            }

            .item-total{
                text-align:left;
            }

        }

    </style>
</head>

<body>

<!-- HEADER -->
<div class="cart-header">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            ⌚ <span>LUXURY</span> WATCH
        </div>

        <a href="/" class="btn btn-light">
            ← Quay lại cửa hàng
        </a>

    </div>
</div>

<div class="container">

    @php
        $cart = session('cart', []);
        $total = 0;
    @endphp

    @if(count($cart) > 0)

    <div class="row">

        <!-- LEFT -->
        <div class="col-lg-8">

            <h2 class="fw-bold mb-4">
                🛒 Giỏ hàng của bạn
            </h2>

            @foreach($cart as $id => $item)

                @php
                    $subtotal = $item['price'] * $item['quantity'];
                    $total += $subtotal;
                @endphp

                <div class="cart-item">

                    <img src="{{ $item['image'] }}" class="cart-img">

                    <div style="flex:1;">

                        <div class="cart-brand">
                            Luxury Watch
                        </div>

                        <div class="cart-name">
                            {{ $item['name'] }}
                        </div>

                        <div class="cart-price">
                            {{ number_format($item['price']) }} đ
                        </div>

                    </div>

                    <!-- QUANTITY -->
                    <div class="qty-box">

                        <a href="/decrease/{{ $id }}" class="qty-btn">
                            -
                        </a>

                        <div class="qty-number">
                            {{ $item['quantity'] }}
                        </div>

                        <a href="/increase/{{ $id }}" class="qty-btn">
                            +
                        </a>

                    </div>

                    <!-- TOTAL -->
                    <div class="item-total">
                        {{ number_format($subtotal) }} đ
                    </div>

                    <!-- DELETE -->
                    <a href="/remove/{{ $id }}">
                        <button class="delete-btn">
                            ✕
                        </button>
                    </a>

                </div>

            @endforeach

        </div>

        <!-- RIGHT -->
        <div class="col-lg-4">

            <div class="checkout-box">

                <div class="checkout-title">
                    Thanh toán
                </div>

                <div class="summary-row">
                    <span>Tạm tính</span>
                    <span>{{ number_format($total) }} đ</span>
                </div>

                <div class="summary-row">
                    <span>Vận chuyển</span>
                    <span>Miễn phí</span>
                </div>

                <hr>

                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <div class="text-muted">
                            Tổng cộng
                        </div>

                        <div class="grand-total">
                            {{ number_format($total) }} đ
                        </div>
                    </div>

                </div>

                <a href="/checkout">
                    <button class="checkout-btn">
                        🧾 THANH TOÁN NGAY
                    </button>
                </a>

                <a href="/">
                    <button class="btn btn-outline-dark continue-btn">
                        ← Tiếp tục mua hàng
                    </button>
                </a>

                <a href="/clear-cart">
                    <button class="btn btn-outline-danger clear-btn">
                        🗑 Xóa toàn bộ giỏ hàng
                    </button>
                </a>

            </div>

        </div>

    </div>

    @else

    <!-- EMPTY -->
    <div class="empty-cart">

        <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png">

        <h3>
            Giỏ hàng đang trống
        </h3>

        <p>
            Hãy khám phá những mẫu đồng hồ đẳng cấp ngay hôm nay
        </p>

        <a href="/">
            <button class="shop-btn">
                MUA SẮM NGAY
            </button>
        </a>

    </div>

    @endif

</div>

</body>
</html>