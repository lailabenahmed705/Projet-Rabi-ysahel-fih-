<?php

namespace Modules\Appointments\app\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Users\App\Models\MedicalTeam;


class AvailabilitySetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_team_id',
        'start_shift',
        'end_shift',
        'break_start',
        'break_end',
        'consultation_duration',
        'transport_time',
    ];
    public function medicalTeam()
    {
        return $this->belongsTo(MedicalTeam::class, 'medical_team_id');
    }


    
}
