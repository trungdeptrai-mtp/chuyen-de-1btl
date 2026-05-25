@extends('admin.layout')

@section('content')

<style>

    .page-title{
        font-weight:800;
        color:#111827;
        margin-bottom:25px;
    }

    .order-card{
        border:none;
        border-radius:22px;
        overflow:hidden;
        box-shadow:0 10px 30px rgba(0,0,0,0.06);
        transition:0.35s;
        background:white;
    }

    .order-card:hover{
        transform:translateY(-5px);
        box-shadow:0 15px 40px rgba(0,0,0,0.12);
    }

    /* HEADER */

    .order-header{
        background:linear-gradient(135deg,#111827,#1f2937);
        color:white;
        padding:22px;
    }

    .order-id{
        font-size:13px;
        opacity:0.8;
    }

    .customer-name{
        font-size:24px;
        font-weight:800;
        margin-top:5px;
    }

    .customer-info{
        color:#d1d5db;
        font-size:14px;
    }

    /* STATUS */

    .status-badge{
        padding:8px 16px;
        border-radius:50px;
        font-size:13px;
        font-weight:700;
        display:inline-block;
    }

    .pending{
        background:#fff3cd;
        color:#b45309;
    }

    .shipping{
        background:#dbeafe;
        color:#1d4ed8;
    }

    .done{
        background:#dcfce7;
        color:#15803d;
    }

    .cancel{
        background:#fee2e2;
        color:#dc2626;
    }

    /* PRODUCTS */

    .product-box{
        background:#f9fafb;
        border-radius:16px;
        padding:15px;
        margin-bottom:12px;
        display:flex;
        justify-content:space-between;
        align-items:center;
        transition:0.3s;
    }

    .product-box:hover{
        background:#f3f4f6;
    }

    .product-name{
        font-weight:700;
        color:#111827;
    }

    .product-qty{
        font-size:13px;
        color:#6b7280;
    }

    .product-price{
        color:#dc2626;
        font-weight:800;
    }

    /* FORM */

    .form-control,
    .form-select{
        border-radius:12px;
        padding:12px;
        border:1px solid #d1d5db;
    }

    .form-control:focus,
    .form-select:focus{
        box-shadow:none;
        border-color:#2563eb;
    }

    /* BUTTON */

    .btn-save{
        background:linear-gradient(135deg,#2563eb,#3b82f6);
        color:white;
        border:none;
        padding:12px;
        border-radius:14px;
        font-weight:700;
        transition:0.3s;
    }

    .btn-save:hover{
        transform:translateY(-2px);
        color:white;
        box-shadow:0 10px 20px rgba(37,99,235,0.25);
    }

    .btn-cancel-order{
        background:linear-gradient(135deg,#dc2626,#ef4444);
        border:none;
        color:white;
        padding:12px;
        border-radius:14px;
        font-weight:700;
        transition:0.3s;
    }

    .btn-cancel-order:hover{
        transform:translateY(-2px);
        color:white;
        box-shadow:0 10px 20px rgba(220,38,38,0.25);
    }

    /* TOTAL */

    .total-box{
        background:linear-gradient(135deg,#111827,#1f2937);
        color:white;
        border-radius:16px;
        padding:20px;
        text-align:center;
    }

    .total-box h3{
        font-weight:800;
        margin-top:8px;
    }

</style>

<h2 class="page-title">
    📦 Quản lý đơn hàng
</h2>

@foreach($orders as $order)

@php
    $items = json_decode($order->items, true) ?? [];

    $total = 0;

    foreach($items as $i){
        $total += ($i['price'] ?? 0) * ($i['quantity'] ?? 0);
    }
@endphp

<div class="card order-card mb-4">

    <!-- HEADER -->
    <div class="order-header d-flex justify-content-between align-items-center flex-wrap">

        <div>

            <div class="order-id">
                ĐƠN HÀNG #{{ $order->id }}
            </div>

            <div class="customer-name">
                {{ $order->name }}
            </div>

            <div class="customer-info mt-2">
                📞 {{ $order->phone }}
            </div>

            <div class="customer-info">
                📍 {{ $order->address }}
            </div>

        </div>

        <div>

            <span class="status-badge {{ $order->status }}">

                @if($order->status == 'pending')
                    ⏳ Chờ xử lý
                @elseif($order->status == 'shipping')
                    🚚 Đang giao
                @elseif($order->status == 'done')
                    ✅ Hoàn thành
                @else
                    ❌ Đã hủy
                @endif

            </span>

        </div>

    </div>

    <div class="card-body p-4">

        <!-- PRODUCTS -->
        <h5 class="fw-bold mb-3">
            🛍️ Sản phẩm
        </h5>

        @foreach($items as $item)

        <div class="product-box">

            <div>

                <div class="product-name">
                    {{ $item['name'] }}
                </div>

                <div class="product-qty">
                    Số lượng: x{{ $item['quantity'] }}
                </div>

            </div>

            <div class="product-price">
                {{ number_format($item['price']) }} đ
            </div>

        </div>

        @endforeach

        <!-- TOTAL -->
        <div class="total-box mt-4">

            <div>
                💰 Tổng thanh toán
            </div>

            <h3>
                {{ number_format($total) }} đ
            </h3>

        </div>

        <!-- UPDATE FORM -->
        <form method="POST"
              action="/admin/update-order/{{ $order->id }}"
              class="mt-4">

            @csrf

            <div class="row g-3">

                <div class="col-md-4">

                    <label class="fw-bold mb-2">
                        Tên khách hàng
                    </label>

                    <input type="text"
                           name="name"
                           value="{{ $order->name }}"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4">

                    <label class="fw-bold mb-2">
                        Số điện thoại
                    </label>

                    <input type="text"
                           name="phone"
                           value="{{ $order->phone }}"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-4">

                    <label class="fw-bold mb-2">
                        Trạng thái
                    </label>

                    <select name="status" class="form-select">

                        <option value="pending"
                            {{ $order->status == 'pending' ? 'selected' : '' }}>
                            ⏳ Chờ xử lý
                        </option>

                        <option value="shipping"
                            {{ $order->status == 'shipping' ? 'selected' : '' }}>
                            🚚 Đang giao
                        </option>

                        <option value="done"
                            {{ $order->status == 'done' ? 'selected' : '' }}>
                            ✅ Hoàn thành
                        </option>

                        <option value="cancel"
                            {{ $order->status == 'cancel' ? 'selected' : '' }}>
                            ❌ Đã hủy
                        </option>

                    </select>

                </div>

                <div class="col-12">

                    <label class="fw-bold mb-2">
                        Địa chỉ giao hàng
                    </label>

                    <input type="text"
                           name="address"
                           value="{{ $order->address }}"
                           class="form-control"
                           required>

                </div>

                <div class="col-md-6">

                    <button type="submit"
                            class="btn btn-save w-100">

                        💾 Cập nhật đơn hàng

                    </button>

                </div>

        </form>

                <!-- CANCEL -->
                <div class="col-md-6">

                    <form action="{{ route('admin.cancel-order', $order->id) }}"
                          method="POST"
                          onsubmit="return confirm('Bạn chắc chắn muốn hủy đơn này?');">

                        @csrf

                        <button type="submit"
                                class="btn btn-cancel-order w-100">

                            ❌ Hủy đơn hàng

                        </button>

                    </form>

                </div>

            </div>

    </div>

</div>

@endforeach

@endsection