<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false; 

    protected $fillable = ['name', 'latitude', 'longitude'];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}