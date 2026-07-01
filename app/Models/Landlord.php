<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Landlord extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id', 'business_name', 'national_id', 'verification_status',
        'verified_at', 'subscription_plan_id', 'subscription_status',
        'trial_ends_at', 'mpesa_paybill',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subscriptionPlan()
    {
        return $this->belongsTo(SubscriptionPlan::class);
    }

    public function tenantTags()
    {
        return $this->hasMany(TenantTag::class);
    }
    public function subscriptionPayments()
    {
    return $this->hasMany(LandlordSubscriptionPayment::class);
    }
    public function properties()
    {
    return $this->hasMany(Property::class);
    }
    public function staff()
    {
    return $this->hasMany(Staff::class);
    }
    public function utilityBills()
    {
    return $this->hasMany(UtilityBill::class);
    }
    public function expenses()
    {
    return $this->hasMany(Expense::class);
    }
}