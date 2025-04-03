<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\CurrencyFactory;



class Currency extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'iso_code', 'exchange_rate', 'decimals', 'status', 'symbol'];
}

