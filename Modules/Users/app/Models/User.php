<?php
namespace Modules\Users\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Traits\HasRoles;  // Import HasRoles trait

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;  // Add HasRoles trait here

    protected $fillable = [
        'name',
        'email',
        'Phone',
        'password',
        'dob',
        'gender',
        'verification_code', // Add this line
        'profile_photo_path',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            Log::info('Creating user: ', $model->attributesToArray());
        });
    }
    public function address()
{
    return $this->morphOne(Address::class, 'addressable');
}


    public function permissions()
    {
        return $this->morphToMany(Permission::class, 'model', 'model_has_permissions', 'model_id', 'permission_id');
    }

    public function medicalTeam()
    {
        return $this->hasOne(MedicalTeam::class);
    }
}
