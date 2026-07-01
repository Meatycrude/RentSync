<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UtilityBill extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'property_id', 'bill_type',
        'amount_kes', 'billing_period', 'is_paid',
    ];

    protected function casts(): array
    {
        return [
            'billing_period' => 'date',
            'is_paid' => 'boolean',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}