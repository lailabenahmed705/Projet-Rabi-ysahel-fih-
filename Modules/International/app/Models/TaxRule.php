<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\TaxRuleFactory;

class TaxRule extends Model
{
  use HasFactory;

  protected $fillable = ['country_id', 'tax_id'];

  // Relation avec le modèle Country
  public function country()
  {
    return $this->belongsTo(Country::class);
  }

  // Relation avec le modèle Tax
  public function tax()
  {
    return $this->belongsTo(Tax::class);
  }
}

