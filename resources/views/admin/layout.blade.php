<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>ADMIN PANEL</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        *{
            font-family:'Inter',sans-serif;
        }

        body{
            background:#f4f7fb;
            overflow-x:hidden;
        }

        /* SIDEBAR */

        .sidebar{
            height:100vh;
            background:linear-gradient(180deg,#111827,#1f2937);
            color:white;
            padding:25px 18px;
            position:sticky;
            top:0;
            box-shadow:8px 0 25px rgba(0,0,0,0.08);
        }

        .logo-admin{
            font-size:24px;
            font-weight:800;
            margin-bottom:35px;
            letter-spacing:1px;
        }

        .logo-admin span{
            color:#ff4d4d;
        }

        .sidebar a{
            color:#cbd5e1;
            display:flex;
            align-items:center;
            gap:12px;
            padding:13px 15px;
            margin-bottom:12px;
            text-decoration:none;
            border-radius:14px;
            font-weight:600;
            transition:0.3s;
        }

        .sidebar a:hover{
            background:rgba(255,255,255,0.08);
            color:white;
            transform:translateX(5px);
        }

        .sidebar a.active{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
            color:white;
            box-shadow:0 8px 20px rgba(37,99,235,0.35);
        }

        .sidebar i{
            font-size:18px;
        }

        /* CONTENT */

        .content-wrapper{
            padding:30px;
        }

        /* TOPBAR */

        .topbar{
            background:white;
            border-radius:18px;
            padding:18px 25px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
            box-shadow:0 5px 20px rgba(0,0,0,0.05);
        }

        .topbar-title h3{
            margin:0;
            font-weight:800;
            color:#111827;
        }

        .topbar-title small{
            color:#6b7280;
        }

        .admin-info{
            display:flex;
            align-items:center;
            gap:12px;
        }

        .admin-avatar{
            width:45px;
            height:45px;
            border-radius:50%;
            background:linear-gradient(135deg,#2563eb,#60a5fa);
            color:white;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:800;
            font-size:18px;
            box-shadow:0 5px 15px rgba(37,99,235,0.3);
        }

        .admin-name{
            font-weight:700;
            color:#111827;
        }

        /* CARD */

        .card-box{
            border-radius:20px;
            padding:25px;
            color:white;
            position:relative;
            overflow:hidden;
            transition:0.35s;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .card-box:hover{
            transform:translateY(-6px);
        }

        .card-box::before{
            content:'';
            position:absolute;
            width:150px;
            height:150px;
            background:rgba(255,255,255,0.08);
            border-radius:50%;
            top:-60px;
            right:-60px;
        }

        .card-box h5{
            font-weight:600;
            opacity:0.9;
        }

        .card-box h2{
            font-size:38px;
            font-weight:800;
            margin-top:10px;
        }

        .card-icon{
            position:absolute;
            right:20px;
            bottom:20px;
            font-size:40px;
            opacity:0.15;
        }

        .bg1{
            background:linear-gradient(135deg,#2563eb,#3b82f6);
        }

        .bg2{
            background:linear-gradient(135deg,#16a34a,#22c55e);
        }

        .bg3{
            background:linear-gradient(135deg,#f59e0b,#fbbf24);
        }

        .bg4{
            background:linear-gradient(135deg,#dc2626,#ef4444);
        }

        /* SCROLLBAR */

        ::-webkit-scrollbar{
            width:8px;
        }

        ::-webkit-scrollbar-thumb{
            background:#cbd5e1;
            border-radius:20px;
        }

    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- SIDEBAR -->
        <div class="col-2 sidebar">

            <div class="logo-admin">
                <span>⌚</span> ADMIN
            </div>

            <a href="/admin" class="active">
                <i class="bi bi-grid-fill"></i>
                Dashboard
            </a>

            <a href="/admin/products">
                <i class="bi bi-watch"></i>
                Sản phẩm
            </a>

            <a href="/admin/add-product">
                <i class="bi bi-plus-circle-fill"></i>
                Thêm sản phẩm
            </a>

            <a href="/admin/orders">
                <i class="bi bi-box-seam-fill"></i>
                Đơn hàng
            </a>

            <a href="/">
                <i class="bi bi-house-door-fill"></i>
                Về trang chủ
            </a>

        </div>

        <!-- CONTENT -->
        <div class="col-10">

            <div class="content-wrapper">

                <!-- TOPBAR -->
                <div class="topbar">

                    <div class="topbar-title">
                        <h3>Casio Store Admin</h3>
                        <small>Quản lý hệ thống cửa hàng đồng hồ</small>
                    </div>

                    <div class="admin-info">

                        <div class="admin-avatar">
                            A
                        </div>

                        <div>
                            <div class="admin-name">
                                Admin
                            </div>

                            <small class="text-muted">
                                Quản trị viên
                            </small>
                        </div>

                    </div>

                </div>

                <!-- CONTENT -->
                @yield('content')

            </div>

        </div>

    </div>
</div>

</body>
</html>