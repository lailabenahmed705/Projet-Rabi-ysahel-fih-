<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Users\App\Models\Company;
use Modules\International\App\Models\City;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\AddressFactory;

class Address extends Model
{
  use HasFactory;

  protected $fillable = ['addressable_type', 'addressable_id', 'address' ,'city_id', 'state_id', 'country_id'];

  /**
   * Relation polymorphe : permet à une adresse d'appartenir à plusieurs modèles (Client, Hotel, etc.).
   */
  public function addressable()
  {
    return $this->morphTo();
  }
 

public function company()
{
    return $this->belongsTo(Company::class, 'company_id');
}


  /**
   * Relation avec la table `cities`.
   */
  public function city()
  {
    return $this->belongsTo(City::class);
  }

  /**
   * Relation avec la table `states`.
   */
  public function state()
  {
    return $this->belongsTo(State::class);
  }

  /**
   * Relation avec la table `countries`.
   */
  public function country()
  {
    return $this->belongsTo(Country::class);
  }

  /**
   * Récupérer automatiquement le code postal depuis la ville associée.
   */
  public function getPostalCodeAttribute()
  {
    return $this->city ? $this->city->postal_code : null;
  }
}

