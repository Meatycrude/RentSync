<?php

namespace Tests\Feature;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AgentRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_user(): void
    {
        $user = User::factory()->create();
        $agent = Agent::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $agent->user);
        $this->assertSame($user->id, $agent->user->id);
    }

    public function test_it_can_be_retrieved_from_the_user(): void
    {
        $user = User::factory()->create();
        Agent::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Agent::class, $user->agent);
    }

    public function test_a_user_can_only_have_one_agent_profile(): void
    {
        $user = User::factory()->create();
        Agent::factory()->create(['user_id' => $user->id]);

        $this->expectException(\Illuminate\Database\QueryException::class);

        Agent::factory()->create(['user_id' => $user->id]);
    }
}