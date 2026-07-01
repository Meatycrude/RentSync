<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'landlord_id', 'property_id', 'category',
        'description', 'amount_kes', 'expense_date', 'receipt_url',
    ];

    protected function casts(): array
    {
        return [
            'expense_date' => 'date',
        ];
    }

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}