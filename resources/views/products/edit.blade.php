<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Sửa Sản Phẩm</h2>
        <form action="{{route('products.update',$product->id)}}" method="POST" enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <!-- Tên sản phẩm -->
            <div class="mb-3">
                <label for="ten_san_pham" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="ten_san_pham" value="{{$product->ten_san_pham}}" name="ten_san_pham" required>
            </div>

            <!-- Giá sản phẩm -->
            <div class="mb-3">
                <label for="gia" class="form-label">Giá</label>
                <input type="number" class="form-control" id="gia" value="{{$product->gia}}" name="gia">
            </div>

            <!-- Mô tả sản phẩm -->
            <div class="mb-3">
                <label for="productDescription" class="form-label">Mô tả</label>
                <textarea class="form-control" id="productDescription"  name="mo_ta" rows="4" required>{{$product->mo_ta}}</textarea>
            </div>

            <!-- Hình ảnh sản phẩm -->
            <div class="mb-3">
                <label for="productImage" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="productImage" name="hinh_anh" accept="image/*" required>
            </div>

            <!-- Nút Submit -->
            <button type="submit" class="btn btn-primary">Update sản phẩm</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
