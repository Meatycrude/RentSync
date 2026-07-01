<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeaseFactory extends Factory
{
    public function definition(): array
    {
        $room = Room::factory()->create();

        return [
            'landlord_id' => $room->landlord_id,
            'room_id' => $room->id,
            'student_id' => Student::factory(),
            'status' => 'active',
            'rent_amount_kes' => $room->rent_amount_kes,
            'move_in_date' => fake()->dateTimeBetween('-6 months', 'now'),
            'deposit_kes' => $room->rent_amount_kes,
        ];
    }
}