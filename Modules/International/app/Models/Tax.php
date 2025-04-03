<?php

namespace Modules\International\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\International\Database\factories\TaxFactory;

class Tax extends Model
{
  protected $fillable = ['name', 'rate', 'is_percentage', 'amount', 'order_id'];
  public function calculateFor($amount)
  {
    return $this->type === 'percentage' ? $amount * ($this->rate / 100) : $this->rate;
  }
  public function order()
  {
    return $this->belongsTo(Order::class); // Make sure this is correct
  }
}
