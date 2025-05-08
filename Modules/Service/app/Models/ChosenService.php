<?php

namespace Modules\Service\app\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Service\Database\factories\ChosenServiceFactory;

class ChosenService extends Model
{
    use HasFactory;

    protected $fillable = [
        'medical_team_id',
        'service_category_id',
    ];

    public function medicalTeam()
    {
        return $this->belongsTo(\Modules\Users\app\Models\MedicalTeam::class);
    }

    public function serviceCategory()
    {
        return $this->belongsTo(\Modules\Service\app\Models\ServiceCategory::class);
    }
}