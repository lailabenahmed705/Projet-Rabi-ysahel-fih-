<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
        'dependency_id',
        'status',
    ];

    public function dependency()
    {
        return $this->belongsTo(Dependency::class);
    }
    public function appointments()
{
    return $this->hasMany(Appointment::class);
}
}
