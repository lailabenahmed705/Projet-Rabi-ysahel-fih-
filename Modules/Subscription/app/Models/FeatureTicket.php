<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Concerns\Expires;
class FeatureTicket extends Model
{
    use Expires;

    protected $fillable = [
        'charges',
        'expired_at',
    ];

    public function feature()
    {
        return $this->belongsTo('feature');
    }

    public function subscriber()
    {
        return $this->morphTo('subscriber');
    }
}
