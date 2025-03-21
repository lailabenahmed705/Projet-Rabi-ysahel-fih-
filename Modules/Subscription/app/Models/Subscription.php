<?php

namespace Modules\Subscription\Entities;
use Modules\Subscription\Entities\Plan;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
     protected $fillable = [
        'plan_id', 'started_at', // and other relevant fields
    ];

    public function subscriber()
    {
        return $this->morphTo();
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
