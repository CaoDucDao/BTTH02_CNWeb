<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. INDEX: Xem danh sách sinh viên
// URL: http://127.0.0.1:8000/students
// Method: GET
Route::get('/', [StudentController::class, 'index'])->name('students.index');

// 2. CREATE: Hiển thị form thêm mới
// URL: http://127.0.0.1:8000/students/create
// Method: GET
// LƯU Ý: Route này phải đặt TRƯỚC route show ({id}) để tránh bị hiểu nhầm 'create' là một ID
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// 3. STORE: Nhận dữ liệu từ form thêm mới để lưu vào CSDL
// URL: http://127.0.0.1:8000/students
// Method: POST
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// 4. SHOW: Xem chi tiết một sinh viên cụ thể
// URL: http://127.0.0.1:8000/students/{id} (Ví dụ: /students/5)
// Method: GET
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

// 5. EDIT: Hiển thị form chỉnh sửa sinh viên
// URL: http://127.0.0.1:8000/students/{id}/edit (Ví dụ: /students/5/edit)
// Method: GET
Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// 6. UPDATE: Nhận dữ liệu sửa đổi để cập nhật vào CSDL
// URL: http://127.0.0.1:8000/students/{id}
// Method: PUT hoặc PATCH
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// 7. DESTROY: Xóa sinh viên
// URL: http://127.0.0.1:8000/students/{id}
// Method: DELETE
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');