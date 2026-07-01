<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = [
        'landlord_id', 'lease_id', 'file_url', 'doc_type',
        'signed_by_landlord_at', 'signed_by_student_at',
    ];

    protected function casts(): array
    {
        return [
            'signed_by_landlord_at' => 'datetime',
            'signed_by_student_at' => 'datetime',
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
}