<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'property_id', 'landlord_id', 'room_number', 'room_type',
        'rent_amount_kes', 'is_furnished',
    ];

    protected function casts(): array
    {
        return [
            'is_furnished' => 'boolean',
        ];
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }
    public function media()
    {
    return $this->hasMany(RoomMedia::class);
    }
    public function leases()
    {
    return $this->hasMany(Lease::class);
    }

    public function isVacant(): bool
    {
        return ! $this->leases()->where('status', 'active')->exists();
    }
}