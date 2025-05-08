<?php

namespace Modules\Subscription\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Subscription\Database\factories\PaymentFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference',
        'amount',
        'user_id',
        'order_id', // ✅ remplacé order_identifier par order_id
    ];

    /**
     * Relation vers l'utilisateur qui a effectué le paiement
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Relation vers la commande associée
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    
}
