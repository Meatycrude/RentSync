<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentReminder extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'invoice_id', 'scheduled_for',
        'channel', 'status', 'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'scheduled_for' => 'datetime',
            'sent_at' => 'datetime',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function invoice()
    {
        return $this->belongsTo(RentInvoice::class, 'invoice_id');
    }
}