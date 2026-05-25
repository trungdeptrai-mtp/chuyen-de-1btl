<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đơn hàng của bạn</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f4f6f9;
            font-family:Arial, Helvetica, sans-serif;
        }

        /* TOP */

        .top-bar{
            background:white;
            border-radius:20px;
            padding:20px 25px;
            box-shadow:0 10px 25px rgba(0,0,0,0.06);
        }

        .page-title{
            font-size:32px;
            font-weight:900;
            margin-bottom:5px;
        }

        .page-sub{
            color:#777;
            font-size:14px;
        }

        /* CARD */

        .order-card{
            border:none;
            border-radius:24px;
            overflow:hidden;
            transition:0.35s;
            background:white;
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .order-card:hover{
            transform:translateY(-5px);
            box-shadow:0 20px 45px rgba(0,0,0,0.12);
        }

        /* HEADER */

        .order-header{
            padding:25px;
            background:linear-gradient(135deg,#ffffff,#f8f9ff);
            border-bottom:1px solid #eee;
        }

        .customer-name{
            font-size:22px;
            font-weight:800;
        }

        .customer-info{
            color:#666;
            font-size:14px;
            margin-top:4px;
        }

        /* STATUS */

        .status{
            padding:10px 18px;
            border-radius:999px;
            color:white;
            font-weight:700;
            font-size:13px;
            letter-spacing:0.3px;
            box-shadow:0 5px 15px rgba(0,0,0,0.1);
        }

        .pending{
            background:linear-gradient(135deg,#ffb200,#ff8800);
        }

        .shipping{
            background:linear-gradient(135deg,#0d6efd,#3d8bfd);
        }

        .done{
            background:linear-gradient(135deg,#1cbf73,#17a95d);
        }

        .cancel{
            background:linear-gradient(135deg,#ff3b3b,#dc3545);
        }

        /* PRODUCT */

        .product-row{
            padding:18px 25px;
            border-bottom:1px solid #f1f1f1;
            transition:0.3s;
        }

        .product-row:hover{
            background:#fafcff;
        }

        .product-img{
            width:85px;
            height:85px;
            border-radius:16px;
            object-fit:cover;
            border:3px solid #fff;
            box-shadow:0 6px 18px rgba(0,0,0,0.08);
        }

        .product-name{
            font-weight:800;
            font-size:16px;
        }

        .product-qty{
            font-size:13px;
            color:#777;
            margin-top:3px;
        }

        .product-price{
            color:#e53935;
            font-weight:900;
            font-size:18px;
        }

        /* TIMELINE */

        .timeline-box{
            padding:25px;
            background:#fbfcff;
        }

        .timeline{
            border-left:3px solid #dbe4ff;
            padding-left:18px;
            margin-left:8px;
        }

        .timeline-item{
            position:relative;
            margin-bottom:18px;
            color:#555;
            font-weight:600;
        }

        .timeline-item::before{
            content:"";
            position:absolute;
            width:14px;
            height:14px;
            background:#0d6efd;
            border-radius:50%;
            left:-26px;
            top:4px;
            box-shadow:0 0 0 4px rgba(13,110,253,0.15);
        }

        /* FOOTER */

        .order-footer{
            padding:22px 25px;
            background:white;
            border-top:1px solid #eee;
        }

        .total-text{
            font-size:14px;
            color:#777;
        }

        .total-price{
            font-size:30px;
            color:#e53935;
            font-weight:900;
            line-height:1;
        }

        /* BUTTON */

        .btn-modern{
            border-radius:999px;
            padding:10px 18px;
            font-weight:700;
            transition:0.3s;
        }

        .btn-modern:hover{
            transform:translateY(-2px);
        }

        .btn-home{
            background:black;
            color:white;
        }

        .btn-home:hover{
            background:#222;
            color:white;
        }

        .btn-cart{
            border:2px solid #0d6efd;
            color:#0d6efd;
        }

        .btn-cart:hover{
            background:#0d6efd;
            color:white;
        }

        .btn-rebuy{
            border:2px solid #6c757d;
            color:#555;
        }

        .btn-rebuy:hover{
            background:#6c757d;
            color:white;
        }

        .btn-cancel{
            background:#dc3545;
            color:white;
        }

        .btn-cancel:hover{
            background:#bb2d3b;
            color:white;
        }

        /* EMPTY */

        .empty-box{
            background:white;
            border-radius:24px;
            padding:80px 30px;
            text-align:center;
            box-shadow:0 10px 30px rgba(0,0,0,0.06);
        }

        .empty-box img{
            width:140px;
            opacity:0.6;
        }

    </style>

</head>

<body>

<div class="container py-5">

    <!-- TOP -->

    <div class="top-bar mb-5 d-flex justify-content-between align-items-center flex-wrap gap-3">

        <div>
            <div class="page-title">
                📦 Đơn hàng của bạn
            </div>

            <div class="page-sub">
                Theo dõi trạng thái đơn hàng nhanh chóng & chuyên nghiệp
            </div>
        </div>

        <div class="d-flex gap-2">

            <a href="/" class="btn btn-modern btn-home">
                🏠 Trang chủ
            </a>

            <a href="/cart" class="btn btn-modern btn-cart">
                🛒 Giỏ hàng
            </a>

        </div>

    </div>

    @if(count($orders) > 0)

        @foreach($orders as $order)

        @php
            $items = json_decode($order->items, true) ?? [];
            $status = $order->status ?? 'pending';
            $total = 0;
        @endphp

        <div class="card order-card mb-5">

            <!-- HEADER -->

            <div class="order-header d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <div class="customer-name">
                        {{ $order->name }}
                    </div>

                    <div class="customer-info">
                        📞 {{ $order->phone }}
                    </div>

                    <div class="customer-info">
                        📍 {{ $order->address }}
                    </div>

                </div>

                <div>

                    <span class="status {{ $status }}">

                        @if($status == 'pending')
                            ⏳ Chờ xử lý
                        @elseif($status == 'shipping')
                            🚚 Đang giao
                        @elseif($status == 'done')
                            ✅ Hoàn thành
                        @else
                            ❌ Đã hủy
                        @endif

                    </span>

                </div>

            </div>

            <!-- PRODUCTS -->

            <div>

                @foreach($items as $item)

                @php
                    $subtotal = ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
                    $total += $subtotal;
                @endphp

                <div class="product-row d-flex align-items-center">

                    <img src="{{ $item['image'] ?? 'https://via.placeholder.com/100' }}"
                         class="product-img me-4">

                    <div class="flex-grow-1">

                        <div class="product-name">
                            {{ $item['name'] }}
                        </div>

                        <div class="product-qty">
                            Số lượng: x{{ $item['quantity'] }}
                        </div>

                    </div>

                    <div class="product-price">
                        {{ number_format($subtotal) }} đ
                    </div>

                </div>

                @endforeach

            </div>

            <!-- TIMELINE -->

            <div class="timeline-box">

                <div class="timeline">

                    <div class="timeline-item">
                        📦 Đặt hàng thành công
                    </div>

                    @if($status != 'pending')
                    <div class="timeline-item">
                        🚚 Đơn hàng đang được vận chuyển
                    </div>
                    @endif

                    @if($status == 'done')
                    <div class="timeline-item">
                        ✅ Đơn hàng đã giao thành công
                    </div>
                    @endif

                    @if($status == 'cancel')
                    <div class="timeline-item text-danger">
                        ❌ Đơn hàng đã bị hủy
                    </div>
                    @endif

                </div>

            </div>

            <!-- FOOTER -->

            <div class="order-footer d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>

                    <div class="total-text">
                        Tổng thanh toán
                    </div>

                    <div class="total-price">
                        {{ number_format($total) }} đ
                    </div>

                </div>

                <div class="d-flex gap-2">

                    <a href="/" class="btn btn-modern btn-rebuy">
                        🔄 Mua lại
                    </a>

                    @if($status == 'pending')

                    <a href="/cancel-order/{{ $order->id }}"
                       class="btn btn-modern btn-cancel">

                        ❌ Hủy đơn

                    </a>

                    @endif

                </div>

            </div>

        </div>

        @endforeach

    @else

        <!-- EMPTY -->

        <div class="empty-box">

            <img src="https://cdn-icons-png.flaticon.com/512/2038/2038854.png">

            <h3 class="fw-bold mt-4">
                Bạn chưa có đơn hàng nào
            </h3>

            <p class="text-muted mt-2">
                Hãy khám phá các mẫu đồng hồ hot nhất hôm nay
            </p>

            <a href="/" class="btn btn-dark rounded-pill px-4 py-2 mt-3">
                🛍️ Mua sắm ngay
            </a>

        </div>

    @endif

</div>

</body>
</html>