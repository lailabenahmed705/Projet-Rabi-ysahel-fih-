<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\GeolocationFactory;

/**
 * Class Geolocation
 *
 * @property $id_geolocation
 * @property $geolocatable_type
 * @property $geolocatable_id
 * @property $latitude
 * @property $longitude
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Geolocation extends Model
{
  protected $perPage = 20;

  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = ['geolocatable_type', 'geolocatable_id', 'latitude', 'longitude'];
  public function geolocatable()
  {
    return $this->morphTo();
  }
}
