<?php

namespace Database\Factories;

use App\Models\Lease;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentFactory extends Factory
{
    public function definition(): array
    {
        $lease = Lease::factory()->create();

        return [
            'landlord_id' => $lease->landlord_id,
            'lease_id' => $lease->id,
            'student_id' => $lease->student_id,
            'invoice_id' => null,
            'amount_kes' => $lease->rent_amount_kes,
            'method' => fake()->randomElement(['mpesa_stk', 'paybill', 'cash', 'bank']),
            'mpesa_receipt' => strtoupper(fake()->bothify('???#######')),
            'status' => 'pending',
            'billing_period' => now()->startOfMonth(),
        ];
    }
}