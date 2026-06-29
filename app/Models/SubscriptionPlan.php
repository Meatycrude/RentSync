<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'name', 'price_kes', 'billing_cycle', 'max_properties',
        'featured_listings_included', 'is_active',
    ];

    public function landlords()
    {
        return $this->hasMany(Landlord::class);
    }
}