<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Form Page</title>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #495057;
        }

        .form-label {
            font-weight: bold;
            color: #495057;
        }

        .form-control {
            border-radius: 4px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Submit Form</h1>
        {{-- Form gửi dữ liệu bằng POST --}}
        <form action="{{ route('post.store') }}" method="POST">
            @csrf

            {{-- Trường nhập tiêu đề --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            {{-- Trường nhập nội dung --}}
            <div class="mb-3">
                <label for="body" class="form-label">Body:</label>
                <textarea id="body" name="body" class="form-control" required></textarea>
            </div>

            {{-- Trường nhập ngày tạo (created_at) --}}
            <div class="mb-3">
                <label for="created_at" class="form-label">Created At:</label>
                <input type="datetime-local" id="created_at" name="created_at" class="form-control"
                    value="{{ now()->format('Y-m-d\TH:i') }}">
            </div>

            {{-- Trường nhập ngày cập nhật (updated_at) --}}
            <div class="mb-3">
                <label for="updated_at" class="form-label">Updated At:</label>
                <input type="datetime-local" id="updated_at" name="updated_at" class="form-control"
                    value="{{ now()->format('Y-m-d\TH:i') }}">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
