<?php

namespace Modules\Patient\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'lastname', 'email', 'phone', 'address', 'gender','profile_photo_path'];

    protected static function newFactory()
    {
        return \Modules\Users\Database\factories\PatientFactory::new();
    }
    
}
