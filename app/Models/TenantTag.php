<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantTag extends Model
{
    use HasFactory, HasUuids;

    public $timestamps = false;

    protected $fillable = ['landlord_id', 'label', 'color'];

    public function landlord()
    {
        return $this->belongsTo(Landlord::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'tenant_tag_assignments', 'tag_id', 'student_id');
    }
}