<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'property_id', 'student_id', 'lease_id',
        'security_rating', 'cleanliness_rating',
        'water_reliability_rating', 'landlord_responsiveness_rating',
        'comment', 'landlord_response', 'is_moderated', 'is_flagged',
    ];

    protected function casts(): array
    {
        return [
            'is_moderated' => 'boolean',
            'is_flagged' => 'boolean',
        ];
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }
}