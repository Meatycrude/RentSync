<?php

namespace Tests\Feature;

use App\Models\Landlord;
use App\Models\TenantTag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantTagRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        $tag = TenantTag::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertInstanceOf(Landlord::class, $tag->landlord);
        $this->assertSame($landlord->id, $tag->landlord->id);
    }

    public function test_it_can_be_retrieved_from_the_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        TenantTag::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertCount(1, $landlord->tenantTags);
    }

    public function test_label_must_be_unique_per_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        TenantTag::factory()->create(['landlord_id' => $landlord->id, 'label' => 'VIP']);

        $this->expectException(\Illuminate\Database\QueryException::class);

        TenantTag::factory()->create(['landlord_id' => $landlord->id, 'label' => 'VIP']);
    }
}