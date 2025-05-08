<?php
namespace Modules\Subscription\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Modules\Subscription\app\Models\Plan;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'role',
        'price',
        'starts_at',  
        'ends_at'
    ];

 

  public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

  public function plan()
{
    return $this->belongsTo(\Modules\Subscription\app\Models\Plan::class);
}

}
