@extends('admin.layout')

@section('content')

<style>

    body{
        background:#f4f6f9;
    }

    .dashboard-title{
        font-size:34px;
        font-weight:900;
        color:#111;
    }

    .dashboard-sub{
        color:#777;
        margin-top:5px;
        font-size:14px;
    }

    /* CARD */

    .card-box{
        position:relative;
        overflow:hidden;
        border-radius:24px;
        padding:30px;
        color:white;
        transition:0.35s;
        box-shadow:0 15px 35px rgba(0,0,0,0.08);
        min-height:180px;
    }

    .card-box:hover{
        transform:translateY(-6px);
        box-shadow:0 20px 45px rgba(0,0,0,0.15);
    }

    .card-box::before{
        content:"";
        position:absolute;
        width:180px;
        height:180px;
        border-radius:50%;
        background:rgba(255,255,255,0.1);
        top:-60px;
        right:-60px;
    }

    .card-box::after{
        content:"";
        position:absolute;
        width:120px;
        height:120px;
        border-radius:50%;
        background:rgba(255,255,255,0.08);
        bottom:-40px;
        right:40px;
    }

    .bg1{
        background:linear-gradient(135deg,#0d6efd,#4b8dff);
    }

    .bg2{
        background:linear-gradient(135deg,#198754,#34c97b);
    }

    .bg3{
        background:linear-gradient(135deg,#ff9800,#ffb74d);
    }

    .bg4{
        background:linear-gradient(135deg,#dc3545,#ff5e6c);
    }

    .card-icon{
        font-size:55px;
        opacity:0.95;
    }

    .card-title{
        font-size:15px;
        font-weight:700;
        opacity:0.9;
        margin-top:20px;
    }

    .card-number{
        font-size:42px;
        font-weight:900;
        line-height:1;
        margin-top:10px;
    }

    /* QUICK */

    .quick-box{
        background:white;
        border-radius:24px;
        padding:30px;
        margin-top:35px;
        box-shadow:0 10px 30px rgba(0,0,0,0.06);
    }

    .quick-title{
        font-size:24px;
        font-weight:800;
        margin-bottom:25px;
    }

    .quick-btn{
        border-radius:18px;
        padding:18px;
        font-weight:800;
        transition:0.3s;
        height:100%;
    }

    .quick-btn:hover{
        transform:translateY(-4px);
    }

    /* WELCOME */

    .welcome-box{
        background:linear-gradient(135deg,#111,#2d2d2d);
        border-radius:28px;
        padding:35px;
        color:white;
        margin-bottom:35px;
        overflow:hidden;
        position:relative;
    }

    .welcome-box::before{
        content:"";
        position:absolute;
        width:300px;
        height:300px;
        border-radius:50%;
        background:rgba(255,255,255,0.05);
        right:-100px;
        top:-100px;
    }

    .welcome-title{
        font-size:38px;
        font-weight:900;
        line-height:1.2;
    }

    .welcome-sub{
        color:#ccc;
        margin-top:10px;
        font-size:15px;
        max-width:600px;
    }

</style>

<div class="container-fluid py-4">

    <!-- WELCOME -->

    <div class="welcome-box">

        <div class="welcome-title">
            ⚙️ ADMIN DASHBOARD
        </div>

        <div class="welcome-sub">
            Quản lý toàn bộ hệ thống Casio Store, theo dõi đơn hàng,
            sản phẩm và hiệu suất bán hàng chuyên nghiệp.
        </div>

    </div>

    <!-- TITLE -->

    <div class="mb-4">

        <div class="dashboard-title">
            📊 Tổng quan hệ thống
        </div>

        <div class="dashboard-sub">
            Dữ liệu realtime từ website bán đồng hồ
        </div>

    </div>

    <!-- STATS -->

    <div class="row">

        <!-- TOTAL ORDERS -->

        <div class="col-md-3 mb-4">

            <div class="card-box bg1">

                <div class="card-icon">
                    📦
                </div>

                <div class="card-title">
                    Tổng đơn hàng
                </div>

                <div class="card-number">
                    {{ $totalOrders }}
                </div>

            </div>

        </div>

        <!-- TOTAL PRODUCTS -->

        <div class="col-md-3 mb-4">

            <div class="card-box bg2">

                <div class="card-icon">
                    ⌚
                </div>

                <div class="card-title">
                    Tổng sản phẩm
                </div>

                <div class="card-number">
                    {{ $totalProducts }}
                </div>

            </div>

        </div>

        <!-- CUSTOMERS -->

        <div class="col-md-3 mb-4">

            <div class="card-box bg3">

                <div class="card-icon">
                    👥
                </div>

                <div class="card-title">
                    Khách hàng
                </div>

                <div class="card-number">
                    128
                </div>

            </div>

        </div>

        <!-- REVENUE -->

        <div class="col-md-3 mb-4">

            <div class="card-box bg4">

                <div class="card-icon">
                    💰
                </div>

                <div class="card-title">
                    Doanh thu
                </div>

                <div class="card-number">
                    2.4B
                </div>

            </div>

        </div>

    </div>

    <!-- QUICK ACTION -->

    <div class="quick-box">

        <div class="quick-title">
            🚀 Thao tác nhanh
        </div>

        <div class="row">

            <div class="col-md-4 mb-3">

                <a href="/admin/products"
                   class="btn btn-dark quick-btn w-100">

                    📦 Quản lý sản phẩm

                </a>

            </div>

            <div class="col-md-4 mb-3">

                <a href="/admin/orders"
                   class="btn btn-primary quick-btn w-100">

                    🧾 Quản lý đơn hàng

                </a>

            </div>

            <div class="col-md-4 mb-3">

                <a href="/admin/product/create"
                   class="btn btn-success quick-btn w-100">

                    ➕ Thêm sản phẩm mới

                </a>

            </div>

        </div>

    </div>

</div>

@endsection