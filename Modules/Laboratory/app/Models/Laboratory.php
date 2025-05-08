<?php

namespace Modules\Laboratory\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\App\Models\City;

class Laboratory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_id', 'address', 'phone', 'email'];

    public function city()
{
    return $this->belongsTo(\Modules\International\App\Models\City::class);
}

public function country()
{
    return $this->belongsTo(\Modules\International\App\Models\Country::class);
}
}
