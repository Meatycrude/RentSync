<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentInvoice extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'lease_id', 'invoice_month', 'rent_amount_kes',
        'extra_charges', 'total_amount_kes', 'amount_paid', 'balance',
        'due_date', 'status',
    ];

    protected function casts(): array
    {
        return [
            'invoice_month' => 'date',
            'due_date' => 'date',
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
    public function payments()
    {
    return $this->hasMany(Payment::class, 'invoice_id');
    }
    public function reminders()
    {
    return $this->hasMany(RentReminder::class, 'invoice_id');
    }
}