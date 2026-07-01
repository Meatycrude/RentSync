<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'room_id', 'student_id', 'preferred_move_in_date',
        'message', 'status', 'lease_id',
    ];

    protected function casts(): array
    {
        return [
            'preferred_move_in_date' => 'date',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
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