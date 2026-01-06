<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classes>
 */
class ClassesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'class_code' => strtoupper(fake()->bothify('K##?')),
            'class_name' => 'Lớp ' . fake()->jobTitle(),
            'semester' => fake()->numberBetween(1, 2),
            'academic_year' => '2024-2025',
            'advisor' => fake()->name(),
        ];
    }
}