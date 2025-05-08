<?php

namespace Modules\Appointments\App\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Appointments\App\Models\AvailabilitySetting;
use Modules\Users\App\Models\MedicalTeam;
use Illuminate\Http\Request;

class AvailabilitySettingsController extends Controller
{
    public function index()
{
    $availabilitySettings = AvailabilitySetting::with('medicalTeam.user')->get(); // on charge la relation utilisateur
    return view('appointments::availability_settings.index', compact('availabilitySettings'));
}

    public function create()
    {
        $medicalTeams = MedicalTeam::all();
        return view('appointments::availability_settings.create', compact('medicalTeams'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medical_team_id' => 'required|exists:medical_team,id',
            'start_shift' => 'required|date_format:H:i',
            'end_shift' => 'required|date_format:H:i',
            'break_start' => 'nullable|date_format:H:i',
            'break_end' => 'nullable|date_format:H:i',
            'consultation_duration' => 'required|integer|min:1',
            'transport_time' => 'required|integer|min:0',
        ]);

        AvailabilitySetting::create($validated);

        return redirect()->route('availability-settings.index')->with('success', 'Availability setting created successfully.');
    }

    public function edit($id)
    {
        $availabilitySetting = AvailabilitySetting::findOrFail($id);
        $medicalTeams = MedicalTeam::all();
        return view('appointments::availability_settings.edit', compact('availabilitySetting', 'medicalTeams'));
    }

    public function update(Request $request, $medical_team_id)
    {
        $validated = $request->validate([
            'start_shift' => 'required|date_format:H:i',
            'end_shift' => 'required|date_format:H:i',
            'break_start' => 'nullable|date_format:H:i',
            'break_end' => 'nullable|date_format:H:i',
            'consultation_duration' => 'required|integer|min:1',
            'transport_time' => 'required|integer|min:0',
        ]);
    
        $availabilitySetting = AvailabilitySetting::where('medical_team_id', $medical_team_id)->firstOrFail();
        $availabilitySetting->update($validated);
    
        return redirect()->route('availability-settings.index')->with('success', 'Availability updated');
    }
    

    public function destroy($id)
    {
        $setting = AvailabilitySetting::findOrFail($id);
        $setting->delete();
    
        return redirect()->route('availability-settings.index')->with('success', 'Availability setting deleted successfully.');
    }
    
}
