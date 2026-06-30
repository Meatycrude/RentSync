<?php

namespace Tests\Feature;

use App\Models\Landlord;
use App\Models\LandlordSubscriptionPayment;
use App\Models\SubscriptionPlan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LandlordSubscriptionPaymentRelationshipTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_belongs_to_a_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        $payment = LandlordSubscriptionPayment::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertInstanceOf(Landlord::class, $payment->landlord);
        $this->assertSame($landlord->id, $payment->landlord->id);
    }

    public function test_it_belongs_to_a_subscription_plan(): void
    {
        $plan = SubscriptionPlan::factory()->create();
        $payment = LandlordSubscriptionPayment::factory()->create(['plan_id' => $plan->id]);

        $this->assertInstanceOf(SubscriptionPlan::class, $payment->plan);
    }

    public function test_it_can_be_retrieved_from_the_landlord(): void
    {
        $landlord = Landlord::factory()->create();
        LandlordSubscriptionPayment::factory()->create(['landlord_id' => $landlord->id]);

        $this->assertCount(1, $landlord->subscriptionPayments);
    }
}