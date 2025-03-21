<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAddress extends Model
{
    use HasFactory;

    protected $table = 'medical_address';

    protected $fillable = [
        'address_complete',
        'dependency_id',
        'currency_id',
        'state_id',
        'country_id',
        'city_id',
    ];

    public function dependency()
    {
        return $this->belongsTo(Dependency::class, 'dependency_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'state_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function medicalTeam()
    {
        return $this->hasOne(MedicalTeam::class, 'medical_address_id');
    }
}
