<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo 3 lớp học
        \App\Models\Classes::factory(3)->create()->each(function ($class) {
            // Với mỗi lớp học, tạo từ 10 đến 12 sinh viên thuộc lớp đó
            \App\Models\Student::factory(rand(10, 12))->create([
                'class_id' => $class->id,
            ]);
        });
    }
}