<?php

namespace Modules\Appointments\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Appointments\App\Models\AvailabilitySetting;
use Illuminate\Http\Request;
use DateTime;
use DateInterval;

class AvailabilityController extends Controller
{
    public function index($medicalTeamId)
{
    $setting = AvailabilitySetting::with('medicalTeam.user')
        ->where('medical_team_id', $medicalTeamId)
        ->firstOrFail();

    $startTime = new \DateTime($setting->start_shift);
    $endTime = new \DateTime($setting->end_shift);
    $breakStart = $setting->break_start ? new \DateTime($setting->break_start) : null;
    $breakEnd = $setting->break_end ? new \DateTime($setting->break_end) : null;

    $slots = [];
    while ($startTime < $endTime) {
        if ($breakStart && $startTime >= $breakStart && $startTime < $breakEnd) {
            $startTime->add(new \DateInterval("PT{$setting->consultation_duration}M"));
            continue;
        }

        $slots[] = $startTime->format('H:i');
        $startTime->add(new \DateInterval("PT{$setting->consultation_duration}M"));
        $startTime->add(new \DateInterval("PT{$setting->transport_time}M"));
    }

    // ⚠️ Le nom exact de la variable doit correspondre à ta vue Blade : `$availabilities`
    $availabilities = [[
        'medical_team_id' => $setting->medical_team_id,
        'medical_team_name' => $setting->medicalTeam->user->name ?? 'N/A',
        'start_shift' => $setting->start_shift,
        'end_shift' => $setting->end_shift,
        'break_start' => $setting->break_start,
        'break_end' => $setting->break_end,
        'consultation_duration' => $setting->consultation_duration,
        'transport_time' => $setting->transport_time,
        'slots' => $slots
    ]];

    return view('appointments::availability.index', compact('availabilities'));
}

}
