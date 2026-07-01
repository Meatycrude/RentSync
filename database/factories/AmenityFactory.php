<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AmenityFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement([
                'Borehole Water', 'CCTV', 'WiFi', 'Parking', 'Backup Generator',
                'Gated Compound', 'Hot Shower', 'Furnished', 'Balcony', 'Laundry Area',
            ]),
        ];
    }
}