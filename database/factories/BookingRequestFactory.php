<?php

namespace Database\Factories;

use App\Models\Room;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingRequestFactory extends Factory
{
    public function definition(): array
    {
        $room = Room::factory()->create();

        return [
            'landlord_id' => $room->landlord_id,
            'room_id' => $room->id,
            'student_id' => Student::factory(),
            'preferred_move_in_date' => fake()->dateTimeBetween('now', '+2 months'),
            'message' => fake()->sentence(),
            'status' => 'pending',
        ];
    }
}