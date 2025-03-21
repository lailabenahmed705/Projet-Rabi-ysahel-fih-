<?php

namespace Modules\Subscription\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use App\Models\Concerns\HandlesRecurrence;

class Plan extends Model
{
    use HandlesRecurrence;
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'grace_days',
        'name',
        'periodicity_type',
        'periodicity',
        'role_id',
        'description',
        'price',
        'price_HT',
        'currency',
        'status',
    ];

    // Relation many-to-many avec le modèle Feature
    public function features()
    {
        return $this->belongsToMany('App\Models\Feature', 'feature_plan', 'plan_id', 'feature_id');
    }

    // Relation one-to-many avec le modèle Subscription
    public function subscriptions()
    {
        return $this->hasMany('subscription');
    }

    // Méthode pour calculer la date de fin de la période de grâce
    public function calculateGraceDaysEnd(Carbon $recurrenceEnd)
    {
        return $recurrenceEnd->copy()->addDays($this->grace_days);
    }

    // Accesseur pour déterminer si le plan a des jours de grâce
    public function getHasGraceDaysAttribute()
    {
        return ! empty($this->grace_days);
    }
    public function calculateTotalWithTaxes($userTaxes)
    {
        $basePrice = $this->price;
        $totalTaxes = 0;

        foreach ($userTaxes as $tax) {
            if ($tax->is_percentage) {
                $totalTaxes += ($basePrice * $tax->rate / 100);
            } else {
                $totalTaxes += $tax->rate;
            }
        }

        return $basePrice + $totalTaxes;
    }
    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
    }
}
