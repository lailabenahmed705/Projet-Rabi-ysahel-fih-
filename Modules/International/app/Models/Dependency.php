<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\DependencyFactory;

class Dependency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
        'state_id',
        'status',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
