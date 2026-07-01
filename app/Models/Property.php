<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'institution_id', 'name', 'description', 'address',
        'latitude', 'longitude', 'distance_to_campus_m', 'walk_time_min',
        'has_water', 'has_internet', 'security_rating',
        'verification_status', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'has_water' => 'boolean',
            'has_internet' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    public function rooms()
    {
    return $this->hasMany(Room::class);
    }
    public function media()
    {
    return $this->hasMany(PropertyMedia::class);
    }

    public function coverImage()
    {
    return $this->hasOne(PropertyMedia::class)->where('is_cover', true);
    } 
    public function amenities()
    {
    return $this->belongsToMany(Amenity::class, 'property_amenities');
    }
    public function favoritedBy()
    {
    return $this->belongsToMany(Student::class, 'favorites');
    }
    public function agents()
    {
    return $this->belongsToMany(Agent::class, 'agent_properties');
    }
    public function utilityBills()
    {
    return $this->hasMany(UtilityBill::class);
    }
    public function expenses()
    {
    return $this->hasMany(Expense::class);
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
}