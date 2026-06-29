<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class InstitutionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'name' => fake()->company() . ' University',
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
        ];
    }
}