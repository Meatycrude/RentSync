<?php

namespace Tests\Feature;

use App\Models\Landlord;
use App\Models\SubscriptionPlan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandlordRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_user(): void
    {
        $user = User::factory()->create();
        $landlord = Landlord::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(User::class, $landlord->user);
        $this->assertSame($user->id, $landlord->user->id);
    }

    public function test_it_belongs_to_a_subscription_plan(): void
    {
        $plan = SubscriptionPlan::factory()->create();
        $landlord = Landlord::factory()->create(['subscription_plan_id' => $plan->id]);

        $this->assertInstanceOf(SubscriptionPlan::class, $landlord->subscriptionPlan);
    }

    public function test_it_can_be_retrieved_from_the_user(): void
    {
        $user = User::factory()->create();
        Landlord::factory()->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Landlord::class, $user->landlord);
    }
}