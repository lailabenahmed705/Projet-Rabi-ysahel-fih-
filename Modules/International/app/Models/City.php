<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\CityFactory;

class City extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'postal_code', 'state_id', 'status'];

  public function state()
  {
    return $this->belongsTo(State::class, 'state_id');
  }
}
