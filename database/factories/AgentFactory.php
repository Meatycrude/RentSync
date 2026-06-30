<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AgentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'agency_name' => fake()->company(),
            'phone' => fake()->unique()->numerify('07########'),
            'verification_status' => 'unverified',
        ];
    }
}