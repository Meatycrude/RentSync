<?php

namespace Tests\Feature;

use App\Models\Institution;
use App\Models\Landlord;
use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PropertyRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        $property = Property::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertInstanceOf(Landlord::class, $property->landlord);
        $this->assertSame($landlord->id, $property->landlord->id);
    }

    public function test_it_belongs_to_an_institution(): void
    {
        $institution = Institution::factory()->create();
        $property = Property::factory()->create(['institution_id' => $institution->id]);

        $this->assertInstanceOf(Institution::class, $property->institution);
    }

    public function test_it_can_be_retrieved_from_the_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        Property::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertCount(1, $landlord->properties);
    }
}