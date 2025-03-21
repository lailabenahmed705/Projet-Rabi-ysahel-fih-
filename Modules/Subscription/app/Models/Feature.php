<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Concerns\HandlesRecurrence;



class Feature extends Model
{
    use HandlesRecurrence;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'consumable',
        'name',
        'periodicity_type',
        'periodicity',
        'quota',
        'postpaid',
        'available',
    ];

    public function plans()
    {
        return $this->belongsToMany('App\Models\Plan', 'feature_plan', 'feature_id', 'plan_id');
    }

    public function tickets()
    {
        return $this->hasMany(config('featureTicket'));
    }
}
