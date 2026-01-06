<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .table-hover tbody tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <span class="navbar-brand mb-0 h1">QUẢN LÝ SINH VIÊN</span>
        </div>
    </nav>

    <div class="container">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-primary">DANH SÁCH SINH VIÊN</h5>
                <a href="{{ route('students.create') }}" class="btn btn-success btn-sm">
                    + Thêm mới
                </a>
            </div>
            
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form action="{{ route('students.index') }}" method="GET" class="mb-3">
                    <div class="input-group" style="max-width: 400px;">
                        <input type="text" name="search" class="form-control" placeholder="Tìm tên hoặc email..." value="{{ request('search') }}">
                        <button class="btn btn-outline-primary" type="submit">Tìm kiếm</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Mã SV</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Lớp</th>
                                <th>Ngày sinh</th>
                                <th>Trạng thái</th>
                                <th class="text-center" width="150">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($students as $student)
                            <tr>
                                <td>{{ $student->student_code }}</td>
                                <td class="fw-bold">{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->class->class_name ?? 'Chưa xếp lớp' }}</td>
                                <td>{{ $student->date_of_birth }}</td>
                                <td>
                                    <span class="badge {{ $student->status == 'Đang học' ? 'bg-success' : ($student->status == 'Nghỉ học' ? 'bg-danger' : 'bg-secondary') }}">
                                        {{ $student->status }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                                    
                                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">Không tìm thấy dữ liệu sinh viên.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $students->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>