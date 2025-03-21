<?php
namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'iso_code',
        'call_prefix',
        'zip_postal_code_format',
        'status',
        'default_currency_id',
    ];

    public function defaultCurrency()
    {
        return $this->belongsTo(Currency::class, 'default_currency_id');
    }
    public function taxes()
    {
        return $this->belongsToMany(Tax::class, 'country_tax');
    }
}
