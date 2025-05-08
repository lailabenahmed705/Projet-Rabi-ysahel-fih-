<?php

namespace Modules\Subscription\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeaturePlan extends Pivot


{
    protected $fillable = [
        'charges',

    ];

    public function feature()
    {
        return $this->belongsTo(feature::class, 'feature_id');
    }

    public function plan()
    {
        return $this->belongsTo(plan::class, 'plan_id');
    }
}
