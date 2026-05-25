<x-app-layout>

    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="fw-bold mb-0 text-dark">
                    🎯 ADMIN DASHBOARD
                </h2>

                <small class="text-muted">
                    Chào mừng quay trở lại hệ thống Casio Store
                </small>
            </div>

            <a href="/" class="btn btn-dark">
                ⌚ Về trang chủ
            </a>
        </div>
    </x-slot>

    <div class="py-4" style="background:#f5f7fb; min-height:100vh;">

        <div class="container">

            <!-- WELCOME -->

            <div class="bg-dark text-white p-5 rounded-4 shadow-lg mb-4 position-relative overflow-hidden">

                <div style="
                    position:absolute;
                    top:-50px;
                    right:-50px;
                    width:220px;
                    height:220px;
                    background:rgba(255,255,255,0.08);
                    border-radius:50%;
                "></div>

                <div style="
                    position:absolute;
                    bottom:-60px;
                    left:-60px;
                    width:250px;
                    height:250px;
                    background:rgba(255,255,255,0.05);
                    border-radius:50%;
                "></div>

                <div class="position-relative">

                    <h1 class="fw-bold mb-3">
                        ⌚ CASIO STORE ADMIN
                    </h1>

                    <p class="mb-4 text-light" style="max-width:700px;">
                        Quản lý toàn bộ sản phẩm, đơn hàng, khách hàng
                        và doanh thu của hệ thống bán đồng hồ cao cấp.
                    </p>

                    <div class="d-flex gap-3 flex-wrap">

                        <a href="/admin/products"
                           class="btn btn-light fw-bold px-4 py-2 rounded-3">
                            📦 Quản lý sản phẩm
                        </a>

                        <a href="/admin/orders"
                           class="btn btn-outline-light fw-bold px-4 py-2 rounded-3">
                            🧾 Quản lý đơn hàng
                        </a>

                    </div>

                </div>

            </div>

            <!-- STATS -->

            <div class="row g-4 mb-4">

                <!-- CARD 1 -->

                <div class="col-md-4">

                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border-0">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="text-muted mb-2">
                                    Tổng sản phẩm
                                </div>

                                <h2 class="fw-bold text-primary">
                                    24+
                                </h2>

                            </div>

                            <div style="
                                width:70px;
                                height:70px;
                                border-radius:20px;
                                background:#e9f2ff;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-size:30px;
                            ">
                                ⌚
                            </div>

                        </div>

                    </div>

                </div>

                <!-- CARD 2 -->

                <div class="col-md-4">

                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border-0">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="text-muted mb-2">
                                    Tổng đơn hàng
                                </div>

                                <h2 class="fw-bold text-success">
                                    {{ \App\Models\Order::count() }}
                                </h2>

                            </div>

                            <div style="
                                width:70px;
                                height:70px;
                                border-radius:20px;
                                background:#eafaf1;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-size:30px;
                            ">
                                📦
                            </div>

                        </div>

                    </div>

                </div>

                <!-- CARD 3 -->

                <div class="col-md-4">

                    <div class="bg-white p-4 rounded-4 shadow-sm h-100 border-0">

                        <div class="d-flex justify-content-between align-items-center">

                            <div>

                                <div class="text-muted mb-2">
                                    Người dùng
                                </div>

                                <h2 class="fw-bold text-danger">
                                    {{ \App\Models\User::count() }}
                                </h2>

                            </div>

                            <div style="
                                width:70px;
                                height:70px;
                                border-radius:20px;
                                background:#fff0f0;
                                display:flex;
                                align-items:center;
                                justify-content:center;
                                font-size:30px;
                            ">
                                👤
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- QUICK ACTION -->

            <div class="bg-white rounded-4 shadow-sm p-4 mb-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold mb-0">
                        ⚡ Thao tác nhanh
                    </h4>

                    <span class="badge bg-success fs-6">
                        ONLINE
                    </span>

                </div>

                <div class="row g-3">

                    <div class="col-md-3">

                        <a href="/admin/products"
                           class="text-decoration-none">

                            <div class="border rounded-4 p-4 text-center h-100 quick-card">

                                <div class="fs-1 mb-3">
                                    📦
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Sản phẩm
                                </h5>

                                <small class="text-muted">
                                    Quản lý kho hàng
                                </small>

                            </div>

                        </a>

                    </div>

                    <div class="col-md-3">

                        <a href="/admin/orders"
                           class="text-decoration-none">

                            <div class="border rounded-4 p-4 text-center h-100 quick-card">

                                <div class="fs-1 mb-3">
                                    🧾
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Đơn hàng
                                </h5>

                                <small class="text-muted">
                                    Theo dõi trạng thái
                                </small>

                            </div>

                        </a>

                    </div>

                    <div class="col-md-3">

                        <a href="/cart"
                           class="text-decoration-none">

                            <div class="border rounded-4 p-4 text-center h-100 quick-card">

                                <div class="fs-1 mb-3">
                                    🛒
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Giỏ hàng
                                </h5>

                                <small class="text-muted">
                                    Kiểm tra thanh toán
                                </small>

                            </div>

                        </a>

                    </div>

                    <div class="col-md-3">

                        <a href="/"
                           class="text-decoration-none">

                            <div class="border rounded-4 p-4 text-center h-100 quick-card">

                                <div class="fs-1 mb-3">
                                    🌐
                                </div>

                                <h5 class="fw-bold text-dark">
                                    Website
                                </h5>

                                <small class="text-muted">
                                    Xem giao diện shop
                                </small>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

            <!-- RECENT -->

            <div class="bg-white rounded-4 shadow-sm p-4">

                <div class="d-flex justify-content-between align-items-center mb-4">

                    <h4 class="fw-bold mb-0">
                        📈 Trạng thái hệ thống
                    </h4>

                    <span class="text-success fw-bold">
                        ● Hoạt động ổn định
                    </span>

                </div>

                <div class="row text-center">

                    <div class="col-md-4 border-end">

                        <h1 class="fw-bold text-primary">
                            99%
                        </h1>

                        <div class="text-muted">
                            Hiệu suất hệ thống
                        </div>

                    </div>

                    <div class="col-md-4 border-end">

                        <h1 class="fw-bold text-success">
                            24/7
                        </h1>

                        <div class="text-muted">
                            Hỗ trợ khách hàng
                        </div>

                    </div>

                    <div class="col-md-4">

                        <h1 class="fw-bold text-danger">
                            VIP
                        </h1>

                        <div class="text-muted">
                            Đồng hồ chính hãng
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <style>

        .quick-card{
            transition:0.3s;
            background:white;
        }

        .quick-card:hover{
            transform:translateY(-5px);
            box-shadow:0 15px 30px rgba(0,0,0,0.08);
            border-color:#0d6efd !important;
        }

    </style>

</x-app-layout>