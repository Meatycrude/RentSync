<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomMedia extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = ['room_id', 'media_type', 'url', 'sort_order'];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}