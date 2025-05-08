<?php

namespace Modules\Pathologies\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pathologies\Database\factories\PathologyFactory;

class Pathology extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $table = 'pathologies';

    protected $fillable = ['name', 'description'];

    
}
