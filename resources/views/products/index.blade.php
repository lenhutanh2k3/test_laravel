<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Danh Sách Sản Phẩm</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-error">
      {{ session('error') }}
    </div>
  @endif
  
  <!-- Hiển thị thông tin sản phẩm nếu có -->
   @isset($sanpham)
      <h3>Thông tin sản phẩm</h3> <br>
      <p>{{$sanpham->id}}</p>
      <p>{{$sanpham->ten_san_pham}}</p>
      <p>{{$sanpham->mo_ta}}</p>
      <p>{{$sanpham->gia}}</p>
      <img src="{{ asset('storage/' . $sanpham->hinh_anh) }}" alt="Hình sản phẩm" width="80" height="80">
      <p>{{$sanpham->created_at}}</p>
      <p>{{$sanpham->updated_at}}</p>
   @endisset

  <div class="container mt-5">
    <h1 class="mb-4">Danh Sách Sản Phẩm</h1>
    <table class="table table-bordered table-hover">
      <thead class="table-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Tên sản phẩm</th>
          <th scope="col">Giá sản phẩm</th>
          <th scope="col">Mô tả</th>
          <th scope="col">Hình ảnh</th>
          <th scope="col">Xóa</th>
          <th scope="col">Sửa</th>
        </tr>
      </thead>
      <tbody>
        @isset($data)
          @foreach ($data as $item)
            <tr onclick="window.location='{{ route('products.show', $item->id) }}'" style="cursor: pointer;">
              <th scope="row">{{ $item->id ?? '' }}</th>
              <td>{{ $item->ten_san_pham }}</td>
              <td>{{ number_format($item->gia, 0, ',', '.') ?? '' }} VND</td>
              <td>{{ $item->mo_ta ?? '' }}</td>
              <td>
                @if(!empty($item->hinh_anh))
                  <img src="{{ asset('storage/' . $item->hinh_anh) }}" alt="Hình sản phẩm" width="80" height="80">
                @else
                  <span>Không có hình</span>
                @endif
              </td>
              <td>
                <form action="{{ route('products.destroy', $item->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Xóa</button>
                </form>
              </td>
              <td>
                <a href="{{ route('products.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
              </td>
            </tr>
          @endforeach
        @endisset
      </tbody>
    </table>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm dữ liệu</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
