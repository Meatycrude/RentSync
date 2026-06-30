<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['user_id', 'agency_name', 'phone', 'verification_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}