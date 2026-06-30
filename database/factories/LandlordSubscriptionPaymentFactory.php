<?php

namespace Database\Factories;

use App\Models\Landlord;
use App\Models\SubscriptionPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class LandlordSubscriptionPaymentFactory extends Factory
{
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-2 months', 'now');

        return [
            'landlord_id' => Landlord::factory(),
            'plan_id' => SubscriptionPlan::factory(),
            'amount_kes' => fake()->numberBetween(500, 5000),
            'mpesa_receipt' => strtoupper(fake()->bothify('???#######')),
            'period_start' => $start,
            'period_end' => (clone $start)->modify('+1 month'),
            'paid_at' => $start,
        ];
    }
}