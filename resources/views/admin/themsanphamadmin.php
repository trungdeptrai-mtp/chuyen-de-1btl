<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f4f6f9;
            font-family: Arial;
        }

        .box{
            max-width:600px;
            margin:60px auto;
            background:white;
            padding:30px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,0.08);
        }

        .title{
            font-size:24px;
            font-weight:800;
            margin-bottom:20px;
        }
    </style>
</head>

<body>

<div class="box">

    <div class="title">➕ Thêm sản phẩm</div>

    <form method="POST" action="/admin/add-product">
        @csrf

        <div class="mb-3">
            <label>Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Giá</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">

    <label class="form-label fw-bold">
        Danh mục
    </label>

    <select name="category" class="form-control">

        <option value="dong-ho">
            Đồng hồ đeo tay
        </option>

        <option value="treo-tuong">
            Đồng hồ treo tường
        </option>

    </select>

</div>
        <div class="mb-3">
            <label>Thương hiệu</label>
            <input type="text" name="brand" class="form-control">
        </div>

        <div class="mb-3">
            <label>Ảnh (URL)</label>
            <input type="text" name="image" class="form-control">
        </div>

        <div class="mb-3">
            <label>Giới tính</label>
            <select name="gender" class="form-control">
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
        </div>
        <div class="mb-3">
    <label>Loại sản phẩm</label>

    <select name="category" class="form-control">

        <option value="">
            Đồng hồ thường
        </option>

        <option value="treo-tuong">
            Đồng hồ treo tường
        </option>

    </select>
</div>
        <button class="btn btn-dark w-100">
            Lưu sản phẩm
        </button>

    </form>

</div>

</body>
</html>