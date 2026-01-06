<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classes;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. INDEX: Hiển thị danh sách sinh viên (có tìm kiếm + phân trang)
    public function index(Request $request)
    {
        $query = Student::with('class'); // Load quan hệ class để tránh query N+1

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $students = $query->latest()->paginate(10);
        return view('students.index', compact('students'));
    }

    // 2. CREATE: Hiển thị form thêm mới sinh viên
    public function create()
    {
        $classes = Classes::all(); // Lấy danh sách lớp để hiện Dropdown
        return view('students.create', compact('classes'));
    }

    // 3. STORE: Xử lý lưu dữ liệu từ form thêm mới vào CSDL
    public function store(Request $request)
    {
        // 1. Validate: Bỏ 'student_code' ra khỏi danh sách yêu cầu nhập
        $request->validate([
            // 'student_code' => 'required...', // XÓA DÒNG NÀY
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'date_of_birth' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'gender' => 'required',
            'status' => 'required',
        ]);

        // 2. Tự động sinh Mã sinh viên
        // Ví dụ: SV + Năm hiện tại + Số ngẫu nhiên (SV20251234)
        $autoCode = 'SV' . date('Y') . rand(1000, 9999);

        // Kiểm tra trùng lặp (nếu cần kỹ hơn thì dùng vòng lặp, ở đây làm đơn giản)
        while (Student::where('student_code', $autoCode)->exists()) {
            $autoCode = 'SV' . date('Y') . rand(1000, 9999);
        }

        // 3. Gộp mã vừa sinh vào dữ liệu request
        $data = $request->all();
        $data['student_code'] = $autoCode;

        // 4. Tạo mới
        Student::create($data);

        return redirect()->route('students.index')->with('success', 'Thêm sinh viên thành công! Mã SV: ' . $autoCode);
    }
    // 4. SHOW: Hiển thị chi tiết thông tin của 1 sinh viên
    public function show($id)
    {
        $student = Student::with('class')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    // 5. EDIT: Hiển thị form chỉnh sửa thông tin
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = Classes::all(); // Cần danh sách lớp để người dùng chọn lại
        return view('students.edit', compact('student', 'classes'));
    }

    // 6. UPDATE: Xử lý lưu dữ liệu cập nhật vào CSDL
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $request->validate([
            // 'student_code' => ... // KHÔNG validate mã sinh viên vì không cho sửa
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id, // Vẫn check email
            'date_of_birth' => 'required|date',
            'class_id' => 'required|exists:classes,id',
            'gender' => 'required',
            'status' => 'required',
        ]);

        // Lấy tất cả dữ liệu trừ student_code (để an toàn, tránh người dùng cố tình hack form)
        $data = $request->except(['student_code']);

        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Cập nhật thành công!');
    }

    // 7. DESTROY: Xóa sinh viên khỏi CSDL
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Đã xóa sinh viên thành công!');
    }
}