<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thêm Sản Phẩm</h2>
        <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="productName" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="productName" name="ten_san_pham" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="productPrice" class="form-label">Giá</label>
                <input type="number" class="form-control" id="productPrice" name="gia" required>
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="productDescription" class="form-label">Mô tả</label>
                <textarea class="form-control" id="productDescription" name="mo_ta" rows="4" required></textarea>
            </div>

            <!-- Hình ảnh sản phẩm -->
            <div class="mb-3">
            <label for="hinh_anh" class="form-label">Hình Ảnh</label>
            <input type="file" name="hinh_anh" class="form-control" id="hinh_anh">
            </div>

            <!-- Nút Submit -->
            <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
