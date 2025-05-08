<?php

namespace Modules\Appointments\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Appointment extends Model
{

    use HasFactory;
    protected $fillable=[
        'patient_id',
        'medical_team_id',
        'availability_id',
        'availability_date', // <- AJOUTE CECI
        'availability_time', // <- ET CECI
        'date',
        'time',
        'status',
        'phone',
        'description',
        'ordonnance',
        'service_category_id',
        'service_id',
        'care_type',
        'patients_id',
        'appointment_location',
        'created_at',
        'updated_at',
        
    ];
    public function medicalTeam()
    {
        return $this->belongsTo('Modules\Users\app\Models\MedicalTeam'::class);
    }
    
    
    
    
    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }



    public function service()
    {
        return $this->belongsTo(\Modules\Service\App\Models\Service::class, 'service_id');
    }
    
    public function serviceCategory()
    {
        return $this->belongsTo(\Modules\Service\App\Models\ServiceCategory::class, 'service_category_id');
    }

    public function patient()
{
    return $this->belongsTo(\Modules\Users\app\Models\Patient::class);
}

    

}
