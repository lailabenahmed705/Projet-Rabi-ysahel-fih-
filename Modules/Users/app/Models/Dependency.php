<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
