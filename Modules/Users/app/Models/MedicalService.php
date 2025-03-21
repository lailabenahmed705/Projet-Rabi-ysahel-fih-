<?php

namespace Modules\users\app\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class MedicalService extends Model
{
    use HasFactory;

    protected $table = 'medical_service';

    protected $fillable = [
        'language',
        'experience',
        'appointment_fees',
        'start_time',
        'end_time',
        'education',
        'certificates',
        'professional_bio',
        'timeslots',
        'nbre_feedbacks',
    ];

    protected $casts = [
        'timeslots' => 'array', // Casts to and from JSON
    ];

    public function medicalTeam()
    {
        return $this->hasOne(MedicalTeam::class, 'medical_service_id');
    }

    public function generateTimeSlots()
    {
        if (empty($this->start_time) || empty($this->end_time)) {
            return []; // Return an empty array if start or end time is not defined
        }

        $slots = [];
        $startTime = Carbon::createFromFormat('H:i:s', $this->start_time);
        $endTime = Carbon::createFromFormat('H:i:s', $this->end_time);

        while ($startTime->lessThan($endTime)) {
            $endSlotTime = (clone $startTime)->addMinutes($this->appointment_duration);
            if ($endSlotTime->greaterThan($endTime)) {
                break; // Prevents slot from ending after work hours
            }
            $slots[] = [
                'start' => $startTime->format('H:i'),
                'end' => $endSlotTime->format('H:i')
            ];
            $startTime = $endSlotTime->addMinutes($this->break_duration);
        }

        return $slots;
    }

    public function getTimeSlots($id)
    {
        $medicalService = MedicalService::findOrFail($id);
        $timeSlots = $medicalService->generateTimeSlots(); // Use the model method to get the time slots
        return response()->json($timeSlots);
    }
}
