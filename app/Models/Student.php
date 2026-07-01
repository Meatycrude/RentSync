<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'user_id', 'full_name', 'institution_id', 'year_of_study',
        'national_id', 'emergency_contact_name', 'emergency_contact_phone',
        'verification_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    public function tags()
    {
    return $this->belongsToMany(TenantTag::class, 'tenant_tag_assignments', 'student_id', 'tag_id')
        ->withPivot('assigned_at');
    }
    public function roommateProfile()
    {
    return $this->hasOne(RoommateProfile::class);
    }
    public function favorites()
    {
    return $this->belongsToMany(Property::class, 'favorites');
    }
    public function bookingRequests()
    {
    return $this->hasMany(BookingRequest::class);
    }
    public function leases()
    {
    return $this->hasMany(Lease::class);
    }

    public function activeLease()
    {
        return $this->hasOne(Lease::class)->where('status', 'active');
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
}