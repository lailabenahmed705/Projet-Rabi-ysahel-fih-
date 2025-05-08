<?php

namespace Modules\Service\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Database\factories\ServiceSubCategoryFactory;

class ServiceSubCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'service_subcategories';

    protected $fillable = [
        'service_category_id',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
    
    protected static function newFactory(): ServiceSubCategoryFactory
    {
        //return ServiceSubCategoryFactory::new();
    }
}
