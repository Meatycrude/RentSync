<?php

namespace Database\Factories;

use App\Models\Landlord;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExpenseFactory extends Factory
{
    public function definition(): array
    {
        return [
            'landlord_id' => Landlord::factory(),
            'property_id' => null,
            'category' => fake()->randomElement(['repairs', 'utilities', 'salaries', 'marketing', 'other']),
            'description' => fake()->sentence(),
            'amount_kes' => fake()->numberBetween(500, 50000),
            'expense_date' => fake()->dateTimeBetween('-3 months', 'now'),
            'receipt_url' => null,
        ];
    }
}