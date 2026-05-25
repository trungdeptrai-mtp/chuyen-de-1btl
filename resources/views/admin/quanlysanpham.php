@extends('admin.layout')

@section('content')

<style>

    .page-title{
        font-weight:800;
        color:#111827;
        margin-bottom:25px;
    }

    /* TABLE BOX */

    .product-wrapper{
        background:white;
        border-radius:24px;
        overflow:hidden;
        box-shadow:0 10px 35px rgba(0,0,0,0.06);
    }

    /* HEADER */

    .table-header{
        padding:25px 30px;
        background:linear-gradient(135deg,#111827,#1f2937);
        color:white;
        display:flex;
        justify-content:space-between;
        align-items:center;
        flex-wrap:wrap;
        gap:15px;
    }

    .table-header h4{
        margin:0;
        font-weight:800;
    }

    .table-header p{
        margin:0;
        opacity:0.8;
        font-size:14px;
    }

    /* SEARCH */

    .search-box{
        position:relative;
        width:300px;
    }

    .search-box input{
        width:100%;
        border:none;
        border-radius:14px;
        padding:12px 15px 12px 45px;
        background:rgba(255,255,255,0.12);
        color:white;
        outline:none;
    }

    .search-box input::placeholder{
        color:#d1d5db;
    }

    .search-box i{
        position:absolute;
        left:15px;
        top:13px;
        color:#d1d5db;
    }

    /* TABLE */

    .custom-table{
        margin:0;
    }

    .custom-table thead{
        background:#f9fafb;
    }

    .custom-table th{
        padding:18px;
        border:none;
        font-size:14px;
        color:#6b7280;
        font-weight:700;
    }

    .custom-table td{
        padding:18px;
        vertical-align:middle;
        border-top:1px solid #f1f5f9;
    }

    .custom-table tbody tr{
        transition:0.25s;
    }

    .custom-table tbody tr:hover{
        background:#f8fafc;
    }

    /* PRODUCT */

    .product-info{
        display:flex;
        align-items:center;
        gap:15px;
    }

    .product-img{
        width:70px;
        height:70px;
        object-fit:cover;
        border-radius:16px;
        box-shadow:0 5px 15px rgba(0,0,0,0.08);
    }

    .product-name{
        font-weight:700;
        color:#111827;
        margin-bottom:4px;
    }

    .product-brand{
        font-size:13px;
        color:#6b7280;
    }

    /* PRICE */

    .price{
        color:#dc2626;
        font-weight:800;
        font-size:16px;
    }

    /* BADGE */

    .stock-badge{
        background:#dcfce7;
        color:#15803d;
        padding:8px 14px;
        border-radius:50px;
        font-size:12px;
        font-weight:700;
    }

    /* BUTTON */

    .btn-delete{
        background:linear-gradient(135deg,#dc2626,#ef4444);
        border:none;
        color:white;
        border-radius:12px;
        padding:10px 16px;
        font-size:13px;
        font-weight:700;
        transition:0.3s;
    }

    .btn-delete:hover{
        color:white;
        transform:translateY(-2px);
        box-shadow:0 10px 20px rgba(220,38,38,0.25);
    }

    .btn-view{
        background:#eff6ff;
        color:#2563eb;
        border:none;
        border-radius:12px;
        padding:10px 16px;
        font-size:13px;
        font-weight:700;
        transition:0.3s;
    }

    .btn-view:hover{
        background:#2563eb;
        color:white;
    }

</style>

<h2 class="page-title">
    🛍 Quản lý sản phẩm
</h2>

<div class="product-wrapper">

    <!-- HEADER -->
    <div class="table-header">

        <div>
            <h4>Danh sách sản phẩm</h4>
            <p>Quản lý toàn bộ đồng hồ trong hệ thống</p>
        </div>

        <div class="search-box">

            <i class="bi bi-search"></i>

            <input type="text"
                   id="searchInput"
                   placeholder="Tìm sản phẩm...">

        </div>

    </div>

    <!-- TABLE -->
    <div class="table-responsive">

        <table class="table custom-table align-middle">

            <thead>

                <tr>
                    <th>ID</th>
                    <th>Sản phẩm</th>
                    <th>Giá tiền</th>
                    <th>Trạng thái</th>
                    <th width="220">Hành động</th>
                </tr>

            </thead>

            <tbody id="productTable">

                @foreach($products as $p)

                <tr>

                    <td class="fw-bold text-secondary">
                        #{{ $p->id }}
                    </td>

                    <td>

                        <div class="product-info">

                            <img src="{{ $p->image }}"
                                 class="product-img"
                                 onerror="this.src='https://via.placeholder.com/100'">

                            <div>

                                <div class="product-name">
                                    {{ $p->name }}
                                </div>

                                <div class="product-brand">
                                    {{ $p->brand ?? 'CASIO' }}
                                </div>

                            </div>

                        </div>

                    </td>

                    <td>

                        <div class="price">
                            {{ number_format($p->price) }} đ
                        </div>

                    </td>

                    <td>

                        <span class="stock-badge">
                            ✅ Đang bán
                        </span>

                    </td>

                    <td>

                        <div class="d-flex gap-2">

                            <a href="/product/{{ $p->id }}"
                               class="btn btn-view">

                                👁 Xem

                            </a>

                            <a href="/admin/delete/{{ $p->id }}"
                               class="btn btn-delete"
                               onclick="return confirm('Bạn chắc chắn muốn xoá sản phẩm này?')">

                                🗑 Xóa

                            </a>

                        </div>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

<!-- SEARCH JS -->
<script>

document.getElementById('searchInput').addEventListener('keyup', function(){

    let value = this.value.toLowerCase();

    let rows = document.querySelectorAll('#productTable tr');

    rows.forEach(row => {

        row.style.display =
            row.innerText.toLowerCase().includes(value)
            ? ''
            : 'none';

    });

});

</script>

@endsection