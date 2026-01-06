<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Mã sinh viên (Khóa chính)
            // Mã lớp (Khóa ngoài -> classes.id) và thiết lập xóa cascade
            $table->foreignId('class_id')->constrained('classes')->onDelete('cascade');
            $table->string('student_code', 20);
            $table->string('name', 100); // Tên sinh viên
            $table->string('email', 100)->unique(); // Email duy nhất
            $table->string('phone', 20)->nullable();
            $table->date('date_of_birth');
            $table->text('address')->nullable();
            $table->enum('gender', ['Nam', 'Nữ', 'Khác']);
            $table->enum('status', ['Đang học', 'Nghỉ học', 'Tốt nghiệp']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};