<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\StateFactory;

class State extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'iso_code', 'country_id', 'status'];

  public function country()
  {
    return $this->belongsTo(Country::class);
  }
  public function City(): HasMany
  {
    return $this->hasMany(City::class);
  }
}
