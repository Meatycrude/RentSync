<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = ['name'];

    public function properties()
    {
    return $this->belongsToMany(Property::class, 'property_amenities');
    }
}