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
        Schema::create('classes', function (Blueprint $table) {
            $table->id(); // Mã lớp (Khóa chính, Auto Increment)
            $table->string('class_code', 20); // Mã lớp (VD: K65A)
            $table->string('class_name', 100); // Tên lớp
            $table->integer('semester'); // Học kỳ (1, 2)
            $table->string('academic_year', 10); // Năm học (VD: 2024-2025)
            $table->string('advisor', 100); // Tên giáo viên chủ nhiệm
            $table->timestamps(); // created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};