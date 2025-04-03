<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\CountryFactory;
 

class Country extends Model
{
  use HasFactory;

  protected $table = 'countries';

  protected $fillable = ['name', 'iso3', 'numeric_code', 'phone_code', 'currency_name', 'region', 'status'];

  public $timestamps = true; // Active automatiquement created_at et updated_at

  public function defaultCurrency()
  {
    return $this->belongsTo(Currency::class, 'default_currency_id');
  }

  public function taxes()
  {
    return $this->belongsToMany(Tax::class, 'country_tax');
  }
}
