<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Sinh viên</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0 fw-bold">CẬP NHẬT THÔNG TIN SINH VIÊN</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('students.update', $student->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            
                            <div class="row mb-3">
                               
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name', $student->name) }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $student->email) }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Ngày sinh</label>
                                    <input type="date" name="date_of_birth" class="form-control" value="{{ old('date_of_birth', $student->date_of_birth) }}" required>
                                </div>
                                <div class ="col-md-6">
                                <label class="form-label fw-bold">Lớp học</label>
                                <select name="class_id" class="form-select" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}" 
                                            {{ (old('class_id', $student->class_id) == $class->id) ? 'selected' : '' }}>
                                            {{ $class->class_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            </div>


                    

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giới tính</label>
                                    <select name="gender" class="form-select">
                                        <option value="Nam" {{ $student->gender == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ $student->gender == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                        <option value="Khác" {{ $student->gender == 'Khác' ? 'selected' : '' }}>Khác</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Trạng thái</label>
                                    <select name="status" class="form-select">
                                        <option value="Đang học" {{ $student->status == 'Đang học' ? 'selected' : '' }}>Đang học</option>
                                        <option value="Nghỉ học" {{ $student->status == 'Nghỉ học' ? 'selected' : '' }}>Nghỉ học</option>
                                        <option value="Tốt nghiệp" {{ $student->status == 'Tốt nghiệp' ? 'selected' : '' }}>Tốt nghiệp</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('students.index') }}" class="btn btn-secondary">Hủy bỏ</a>
                                <button type="submit" class="btn btn-warning">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>