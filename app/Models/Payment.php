<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'landlord_id', 'lease_id', 'student_id', 'invoice_id',
        'amount_kes', 'method', 'mpesa_receipt', 'status',
        'billing_period', 'paid_at',
    ];

    protected function casts(): array
    {
        return [
            'billing_period' => 'date',
            'paid_at' => 'datetime',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function lease()
    {
        return $this->belongsTo(Lease::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function invoice()
    {
        return $this->belongsTo(RentInvoice::class, 'invoice_id');
    }
}