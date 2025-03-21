<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'iso_code',
        'country_id',
        'status',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function dependencies(): HasMany
    {
        return $this->hasMany(Dependency::class);
    }
}
