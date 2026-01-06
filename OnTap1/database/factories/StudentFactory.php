<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => fake()->unique()->numerify('2024####'),
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'date_of_birth' => fake()->date('Y-m-d', '2006-01-01'),
            'address' => fake()->address(),
            'gender' => fake()->randomElement(['Nam', 'Nữ', 'Khác']),
            'status' => fake()->randomElement(['Đang học', 'Nghỉ học', 'Tốt nghiệp']),
        ];
    }
}