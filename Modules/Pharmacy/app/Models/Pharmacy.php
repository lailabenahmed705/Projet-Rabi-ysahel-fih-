<?php
// Modules/Pharmacy/App/Models/Pharmacy.php

namespace Modules\Pharmacy\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pharmacy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address', 'phone', 'email',
        'open_time', 'close_time', 'is_open',
        'city_id', 'state_id', 'country_id'
    ];

    // Relations
    public function city() {
        return $this->belongsTo(\Modules\International\App\Models\City::class);
    }

    public function state() {
        return $this->belongsTo(\Modules\International\App\Models\State::class);
    }

    public function country() {
        return $this->belongsTo(\Modules\International\App\Models\Country::class);
    }
}
