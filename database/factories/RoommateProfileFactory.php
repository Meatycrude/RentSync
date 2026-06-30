<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class RoommateProfileFactory extends Factory
{
    public function definition(): array
    {
        return [
            'student_id' => Student::factory(),
            'gender' => fake()->randomElement(['male', 'female']),
            'budget_min' => fake()->numberBetween(2000, 5000),
            'budget_max' => fake()->numberBetween(5000, 10000),
            'lifestyle_tags' => fake()->randomElements(['quiet', 'social', 'early_riser', 'night_owl', 'non_smoker'], 2),
            'is_searching' => true,
        ];
    }
}