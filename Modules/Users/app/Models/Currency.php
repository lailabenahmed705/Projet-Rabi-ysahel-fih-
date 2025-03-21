<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;
    protected $fillable = [
      'name',
      'iso_code',
      'exchange_rate',
      'decimals',
      'status',
      'symbol',
  ];
}
