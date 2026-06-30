<?php

namespace Database\Factories;

use App\Models\Landlord;
use Illuminate\Database\Eloquent\Factories\Factory;

class TenantTagFactory extends Factory
{
    public function definition(): array
    {
        return [
            'landlord_id' => Landlord::factory(),
            'label' => fake()->randomElement(['VIP', 'Pays Early', 'Noisy', 'Long Term', 'Graduating Soon']),
            'color' => fake()->hexColor(),
        ];
    }
}
