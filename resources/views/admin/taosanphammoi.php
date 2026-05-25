@extends('admin.layout')

@section('content')

<style>

    body{
        background:#f4f6f9;
    }

    .page-title{
        font-size:32px;
        font-weight:900;
        color:#111;
    }

    .page-sub{
        color:#777;
        margin-top:5px;
        font-size:14px;
    }

    .product-card{
        border:none;
        border-radius:24px;
        overflow:hidden;
        background:white;
        box-shadow:0 15px 35px rgba(0,0,0,0.06);
    }

    .card-header-custom{
        background:linear-gradient(135deg,#111,#2c2c2c);
        padding:28px 35px;
        color:white;
    }

    .card-header-custom h4{
        margin:0;
        font-size:24px;
        font-weight:800;
    }

    .card-header-custom p{
        margin:6px 0 0;
        color:#ccc;
        font-size:14px;
    }

    .form-section{
        padding:35px;
    }

    .form-label{
        font-weight:800;
        margin-bottom:10px;
        color:#222;
        font-size:14px;
    }

    .form-control{
        border-radius:16px;
        border:2px solid #ececec;
        padding:14px 16px;
        transition:0.3s;
        box-shadow:none !important;
    }

    .form-control:focus{
        border-color:#0d6efd;
        transform:translateY(-1px);
        box-shadow:0 10px 20px rgba(13,110,253,0.08) !important;
    }

    textarea.form-control{
        resize:none;
    }

    .upload-box{
        border:2px dashed #d0d7e2;
        border-radius:20px;
        padding:35px;
        text-align:center;
        background:#fafcff;
        transition:0.3s;
    }

    .upload-box:hover{
        border-color:#0d6efd;
        background:#f5f9ff;
    }

    .upload-icon{
        font-size:50px;
        margin-bottom:10px;
    }

    .btn-save{
        background:linear-gradient(135deg,#198754,#26b96b);
        color:white;
        border:none;
        border-radius:14px;
        padding:14px 28px;
        font-weight:800;
        transition:0.3s;
        box-shadow:0 10px 20px rgba(25,135,84,0.2);
    }

    .btn-save:hover{
        transform:translateY(-2px);
        box-shadow:0 15px 25px rgba(25,135,84,0.3);
        color:white;
    }

    .btn-cancel{
        border-radius:14px;
        padding:14px 28px;
        font-weight:700;
    }

    .preview-box{
        margin-top:18px;
        display:none;
    }

    .preview-box img{
        width:140px;
        height:140px;
        object-fit:cover;
        border-radius:18px;
        border:4px solid white;
        box-shadow:0 10px 25px rgba(0,0,0,0.1);
    }

    .info-box{
        background:linear-gradient(135deg,#f8f9ff,#ffffff);
        border:1px solid #eef1f5;
        border-radius:18px;
        padding:20px;
        margin-top:30px;
    }

    .info-box h6{
        font-weight:800;
        margin-bottom:10px;
    }

    .info-box p{
        color:#666;
        margin:0;
        font-size:14px;
        line-height:1.7;
    }

</style>

<div class="container-fluid py-4">

    <!-- TITLE -->

    <div class="mb-4">

        <div class="page-title">
            ⌚ Thêm sản phẩm mới
        </div>

        <div class="page-sub">
            Quản lý & cập nhật sản phẩm cao cấp cho Casio Store
        </div>

    </div>

    <!-- CARD -->

    <div class="card product-card">

        <!-- HEADER -->

        <div class="card-header-custom">

            <h4>
                📦 Thông tin sản phẩm
            </h4>

            <p>
                Điền đầy đủ thông tin để sản phẩm hiển thị đẹp mắt trên hệ thống
            </p>

        </div>

        <!-- BODY -->

        <div class="form-section">

            <form action="{{ route('admin.product.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="row">

                    <!-- NAME -->

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Tên sản phẩm
                        </label>

                        <input type="text"
                               name="name"
                               class="form-control"
                               placeholder="Ví dụ: Casio G-Shock GA-2100">

                    </div>

                    <!-- PRICE -->

                    <div class="col-md-6 mb-4">

                        <label class="form-label">
                            Giá tiền (VNĐ)
                        </label>

                        <input type="number"
                               name="price"
                               class="form-control"
                               placeholder="Ví dụ: 2500000">

                    </div>

                </div>

                <!-- IMAGE -->

                <div class="mb-4">

                    <label class="form-label">
                        Ảnh sản phẩm
                    </label>

                    <div class="upload-box">

                        <div class="upload-icon">
                            🖼️
                        </div>

                        <h5 class="fw-bold">
                            Tải ảnh sản phẩm
                        </h5>

                        <p class="text-muted small mb-3">
                            Hỗ trợ JPG, PNG, WEBP
                        </p>

                        <input type="file"
                               id="imageInput"
                               name="image"
                               class="form-control"
                               accept="image/*">

                        <div class="preview-box text-center" id="previewBox">

                            <img id="previewImage">

                        </div>

                    </div>

                </div>

                <!-- DESCRIPTION -->

                <div class="mb-4">

                    <label class="form-label">
                        Mô tả sản phẩm
                    </label>

                    <textarea name="description"
                              class="form-control"
                              rows="5"
                              placeholder="Nhập mô tả, thông số kỹ thuật, chất liệu, chống nước..."></textarea>

                </div>

                <!-- EXTRA -->

                <div class="info-box">

                    <h6>
                        💡 Mẹo tối ưu hiển thị
                    </h6>

                    <p>
                        Nên sử dụng ảnh nền sáng, kích thước vuông và mô tả rõ chất liệu,
                        chống nước, kích thước mặt đồng hồ để sản phẩm chuyên nghiệp hơn.
                    </p>

                </div>

                <!-- BUTTON -->

                <div class="mt-4 d-flex gap-3">

                    <button type="submit" class="btn btn-save">

                        💾 Lưu sản phẩm

                    </button>

                    <a href="{{ route('admin.index') }}"
                       class="btn btn-secondary btn-cancel">

                        Hủy

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

<!-- PREVIEW IMAGE -->

<script>

    const imageInput = document.getElementById('imageInput');

    const previewImage = document.getElementById('previewImage');

    const previewBox = document.getElementById('previewBox');

    imageInput.addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            previewImage.src = URL.createObjectURL(file);

            previewBox.style.display = 'block';

        }

    });

</script>

@endsection