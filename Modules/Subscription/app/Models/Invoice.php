<?php

namespace Modules\Subscription\app\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'invoices';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_identifier', 'total_price', 'plan_id', 'user_email', 'user_name', 'user_id'
    ];

    /**
     * La relation vers le modèle Plan.
     */
    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    /**
     * La relation vers le modèle User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * La relation vers le modèle Order.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_identifier', 'order_identifier');
    }

    /**
     * Boot method for model events.
     */
   
}
