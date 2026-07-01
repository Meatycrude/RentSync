<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'room_id', 'student_id', 'document_id', 'status', 'rent_amount_kes',
        'move_in_date', 'move_out_date', 'lease_expiry_date', 'deposit_kes',
    ];

    protected function casts(): array
    {
        return [
            'move_in_date' => 'date',
            'move_out_date' => 'date',
            'lease_expiry_date' => 'date',
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
    public function document()
    {
    return $this->belongsTo(Document::class);
    }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function invoices()
    {
    return $this->hasMany(RentInvoice::class);
    }
    public function payments()
    {
    return $this->hasMany(Payment::class);
    }
    public function reviews()
    {
    return $this->hasMany(Review::class);
    }
}