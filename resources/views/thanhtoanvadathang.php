<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Luxury Checkout</title>

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
        .topbar{
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
            color:#ff3d57;
        }

        /* CARD */
        .checkout-card{
            background:#fff;
            border-radius:24px;
            padding:30px;
            box-shadow:0 10px 30px rgba(0,0,0,0.05);
            border:1px solid #eee;
        }

        .section-title{
            font-size:28px;
            font-weight:700;
            margin-bottom:25px;
        }

        /* FORM */
        .form-label{
            font-weight:600;
            margin-bottom:8px;
        }

        .form-control,
        .form-select{
            height:55px;
            border-radius:14px;
            border:1px solid #ddd;
            box-shadow:none !important;
        }

        textarea.form-control{
            height:120px;
            resize:none;
        }

        .form-control:focus,
        .form-select:focus{
            border-color:#ff4d4d;
        }

        /* BUTTON */
        .order-btn{
            width:100%;
            height:60px;
            border:none;
            border-radius:16px;
            background:linear-gradient(135deg,#ff4d4d,#ff0033);
            color:#fff;
            font-size:18px;
            font-weight:bold;
            transition:0.3s;
        }

        .order-btn:hover{
            transform:translateY(-2px);
            box-shadow:0 12px 24px rgba(255,0,51,0.3);
        }

        .nav-btn{
            height:52px;
            border-radius:14px;
            font-weight:600;
        }

        /* ORDER ITEM */
        .order-item{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:18px 0;
            border-bottom:1px solid #eee;
        }

        .item-left{
            display:flex;
            align-items:center;
            gap:15px;
        }

        .item-img{
            width:70px;
            height:70px;
            border-radius:14px;
            object-fit:cover;
            background:#f5f5f5;
        }

        .item-name{
            font-weight:700;
            margin-bottom:5px;
        }

        .item-qty{
            color:#888;
            font-size:14px;
        }

        .item-price{
            font-weight:bold;
            color:#ff0033;
        }

        /* TOTAL */
        .total-box{
            background:#111;
            color:#fff;
            border-radius:18px;
            padding:25px;
            margin-top:25px;
        }

        .total-label{
            color:#bbb;
            margin-bottom:10px;
        }

        .total-price{
            font-size:38px;
            font-weight:bold;
            color:#ff4d4d;
        }

        /* PAYMENT */
        .payment-box{
            background:#fff;
            border-radius:20px;
            padding:25px;
            margin-top:25px;
            border:1px solid #eee;
            box-shadow:0 10px 30px rgba(0,0,0,0.04);
        }

        .payment-method{
            display:flex;
            align-items:center;
            gap:15px;
            padding:16px;
            border:2px solid #eee;
            border-radius:16px;
            margin-bottom:15px;
            cursor:pointer;
            transition:0.3s;
        }

        .payment-method:hover{
            border-color:#ff4d4d;
            background:#fff8f8;
        }

        .payment-method.active{
            border-color:#ff0033;
            background:#fff5f5;
        }

        .payment-icon{
            font-size:28px;
        }

        /* QR */
        #qr-box{
            display:none;
            animation:fadeIn .4s ease;
        }

        .qr-img{
            width:280px;
            border-radius:20px;
            background:#fff;
            padding:12px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .qr-price{
            font-size:32px;
            font-weight:bold;
            color:#ff0033;
            margin-top:20px;
        }

        .success-note{
            background:#f8fff8;
            border:1px solid #d4f5d4;
            color:#27ae60;
            padding:15px;
            border-radius:14px;
            margin-top:20px;
            font-weight:600;
        }

        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(15px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

    </style>
</head>
<body>

<!-- HEADER -->
<div class="topbar">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            ⌚ <span>LUXURY</span> WATCH
        </div>

        <a href="/cart" class="btn btn-light">
            ← Quay lại giỏ hàng
        </a>

    </div>
</div>

<div class="container mb-5">

    @php
        $cart = session('cart', []);
        $total = 0;
    @endphp

    <div class="row g-4">

        <!-- LEFT -->
        <div class="col-lg-7">

            <div class="checkout-card">

                <div class="section-title">
                    💳 Thông tin thanh toán
                </div>

                <form action="/place-order" method="POST">

                    @csrf

                    <div class="mb-4">
                        <label class="form-label">
                            Họ và tên
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Nhập họ tên..."
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Số điện thoại
                        </label>

                        <input type="text"
                               name="phone"
                               class="form-control"
                               placeholder="Nhập số điện thoại..."
                               required>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">
                            Địa chỉ giao hàng
                        </label>

                        <textarea name="address"
                                  class="form-control"
                                  placeholder="Nhập địa chỉ nhận hàng..."
                                  required></textarea>
                    </div>

                    <!-- PAYMENT -->
                    <div class="mb-4">

                        <label class="form-label">
                            Phương thức thanh toán
                        </label>

                        <select name="payment"
                                id="payment"
                                class="form-select">

                            <option value="cod">
                                Thanh toán khi nhận hàng
                            </option>

                            <option value="qr">
                                Chuyển khoản QR
                            </option>

                        </select>

                    </div>

                    <button class="order-btn">
                        🚀 XÁC NHẬN ĐẶT HÀNG
                    </button>

                    <div class="row mt-3">

                        <div class="col-6">
                            <a href="/"
                               class="btn btn-outline-secondary nav-btn w-100">

                                ← Trang chủ
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="{{ route('orders') }}"
                               class="btn btn-outline-primary nav-btn w-100">

                                📦 Đơn hàng
                            </a>
                        </div>

                    </div>

                </form>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="col-lg-5">

            <div class="checkout-card">

                <div class="section-title">
                    🛍 Đơn hàng của bạn
                </div>

                @foreach($cart as $item)

                    @php
                        $subtotal = $item['price'] * $item['quantity'];
                        $total += $subtotal;
                    @endphp

                    <div class="order-item">

                        <div class="item-left">

                            <img src="{{ $item['image'] }}"
                                 class="item-img">

                            <div>

                                <div class="item-name">
                                    {{ $item['name'] }}
                                </div>

                                <div class="item-qty">
                                    Số lượng: x{{ $item['quantity'] }}
                                </div>

                            </div>

                        </div>

                        <div class="item-price">
                            {{ number_format($subtotal) }} đ
                        </div>

                    </div>

                @endforeach

                <!-- TOTAL -->
                <div class="total-box">

                    <div class="total-label">
                        Tổng thanh toán
                    </div>

                    <div class="total-price">
                        {{ number_format($total) }} đ
                    </div>

                </div>

            </div>

            <!-- QR -->
            @php
                $bank = "mbbank";
                $stk = "5678929112004";
                $name = "NGUYEN THANH TRUNG";

                $amount = $total;
                $content = "DH" . time();

                $qr = "https://img.vietqr.io/image/{$bank}-{$stk}-compact.png?amount={$amount}&addInfo={$content}&accountName=" . urlencode($name);
            @endphp

            <div id="qr-box" class="payment-box text-center">

                <h4 class="fw-bold mb-3">
                    📱 Quét mã QR để thanh toán
                </h4>

                <img src="{{ $qr }}"
                     class="qr-img img-fluid">

                <div class="qr-price">
                    {{ number_format($total) }} đ
                </div>

                <div class="success-note">
                    ✔ Sau khi chuyển khoản, hệ thống sẽ tự xác nhận đơn hàng.
                </div>

            </div>

        </div>

    </div>

</div>

<script>

    const payment = document.getElementById('payment');
    const qrBox = document.getElementById('qr-box');

    payment.addEventListener('change', function(){

        if(this.value === 'qr'){

            qrBox.style.display = 'block';

        }else{

            qrBox.style.display = 'none';

        }

    });

</script>

</body>
</html>