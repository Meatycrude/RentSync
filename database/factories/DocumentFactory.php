<?php

namespace Database\Factories;

use App\Models\Lease;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentFactory extends Factory
{
    public function definition(): array
    {
        $lease = Lease::factory()->create();

        return [
            'landlord_id' => $lease->landlord_id,
            'lease_id' => $lease->id,
            'file_url' => fake()->url() . '/lease-agreement.pdf',
            'doc_type' => 'lease_agreement',
        ];
    }
}