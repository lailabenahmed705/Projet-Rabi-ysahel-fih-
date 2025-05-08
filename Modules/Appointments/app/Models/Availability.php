<?php

namespace Modules\Appointments\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
   

    use HasFactory;
    

    protected $fillable = [
        'medical_team_id',
        'date',
        'start_time',
        'end_time'];
    public function medicalTeam()
    {
        return $this->belongsTo('Modules\Users\app\MedicalTeam'::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
