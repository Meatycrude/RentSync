<?php

namespace Tests\Feature;

use App\Models\RoommateProfile;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RoommateProfileRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_student(): void
    {
        $student = Student::factory()->create();
        $profile = RoommateProfile::factory()->create(['student_id' => $student->id]);

        $this->assertInstanceOf(Student::class, $profile->student);
        $this->assertSame($student->id, $profile->student->id);
    }

    public function test_it_can_be_retrieved_from_the_student(): void
    {
        $student = Student::factory()->create();
        RoommateProfile::factory()->create(['student_id' => $student->id]);

        $this->assertInstanceOf(RoommateProfile::class, $student->roommateProfile);
    }

    public function test_a_student_can_only_have_one_roommate_profile(): void
    {
        $student = Student::factory()->create();
        RoommateProfile::factory()->create(['student_id' => $student->id]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        RoommateProfile::factory()->create(['student_id' => $student->id]);
    }
}