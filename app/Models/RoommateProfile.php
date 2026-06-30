<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoommateProfile extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'student_id', 'gender', 'budget_min', 'budget_max',
        'lifestyle_tags', 'is_searching',
    ];

    protected function casts(): array
    {
        return [
            'lifestyle_tags' => 'array',
            'is_searching' => 'boolean',
        ];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}