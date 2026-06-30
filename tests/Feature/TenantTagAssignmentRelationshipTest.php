<?php

namespace Tests\Feature;

use App\Models\Student;
use App\Models\TenantTag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantTagAssignmentRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_student_can_have_many_tags(): void
    {
        $student = Student::factory()->create();
        $tagOne = TenantTag::factory()->create();
        $tagTwo = TenantTag::factory()->create();

        $student->tags()->attach([$tagOne->id, $tagTwo->id]);

        $this->assertCount(2, $student->tags);
    }

    public function test_a_tag_can_be_assigned_to_many_students(): void
    {
        $tag = TenantTag::factory()->create();
        $studentOne = Student::factory()->create();
        $studentTwo = Student::factory()->create();

        $tag->students()->attach([$studentOne->id, $studentTwo->id]);

        $this->assertCount(2, $tag->students);
    }

    public function test_a_student_cannot_have_the_same_tag_assigned_twice(): void
    {
        $student = Student::factory()->create();
        $tag = TenantTag::factory()->create();

        $student->tags()->attach($tag->id);

        $this->expectException(\Illuminate\Database\QueryException::class);

        $student->tags()->attach($tag->id);
    }
}