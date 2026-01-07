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
                        <h5 class="mb-0">Cap Nhap NHAN VIEN MOI</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('employees.update',$employees->id) }}" method="POST">
                            @csrf
                            @method("PUT")
                            <div class="row mb-3">
                              
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Họ và Tên</label>
                                    <input type="text" name="name" class="form-control" value="{{$employees->name }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" name="email" class="form-control" value="{{ $employees->email }}" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                            
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">SDT</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $employees->phone }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Phong ban</label>
                                <select name="department_id" class="form-select" required>
                                    <option value="">-- Chọn phong ban --</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}"
                                            {{ (old('department_id',$employees->department_id)==$department->id) ?'selected':" "}}>
                                            {{ $department->name }}
                                        </option>
                                        
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Giới tính</label>
                                    <select name="position" class="form-select">
                                        <option value="truong ban"{{$employees->position=="truong ban"? 'selected' : ''}}>Truong Ban</option>
                                        <option value="pho ban"{{$employees->position=="pho ban"? 'selected' : ''}}>pho ban</option>
                                         <option value="thanh vien"{{$employees->position=="thanh vien"? 'selected' : ''}}>Thanh vien</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">luong</label>
                                     <input type="number" name="salary" class="form-control" value="{{$employees->salary }}" required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Quay lại</a>
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