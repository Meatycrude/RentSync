<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubscriptionPlanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => (string) Str::uuid(),
            'name' => fake()->randomElement(['Basic', 'Pro', 'Premium']),
            'price_kes' => fake()->numberBetween(500, 5000),
            'is_active' => true,
        ];
    }
}