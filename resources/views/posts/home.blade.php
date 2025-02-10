<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4">Posts List</h1>

        <!-- Thông báo thành công hoặc thất bại -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @isset($posts)
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Body</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Updated</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id ?? 'khong co' }}</td>
                            <td>{{ $post->title ?? 'khong co' }}</td>
                            <td>{{ $post->body ?? 'khong co' }}</td>
                            <td>{{ $post->created_at ?? 'khong co' }}</td>
                            <td>{{ $post->updated_at ?? 'khong co' }}</td>
                            <td>
                                <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            </td>
                            <td><a href="{{ route('post.edit', ['id' => $post->id]) }}" class="btn btn-warning">Sửa</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endisset

        <a href="{{ route('post.create') }}" class="btn btn-primary">Thêm dữ liệu</a>

    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
