<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">THÊM SINH VIÊN MỚI</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('students.store') }}" method="POST">
                            @csrf
                            
                            <div class="row mb-3">
                              
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ngày sinh</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth') }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Lớp học</label>
                                <select name="class_id" class="form-select" required>
                                    <option value="">-- Chọn lớp --</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giới tính</label>
                                    <select name="gender" class="form-select">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                        <option value="Khác">Khác</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select name="status" class="form-select">
                                        <option value="Đang học">Đang học</option>
                                        <option value="Nghỉ học">Nghỉ học</option>
                                        <option value="Tốt nghiệp">Tốt nghiệp</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Quay lại</a>
                                <button type="submit" class="btn btn-primary">Lưu Mới</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>