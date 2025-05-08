<?php

namespace Modules\Appointments\App\Http\Controllers;
use Modules\Appointments\App\Models\Appointment;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RestAppointmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($medicalTeamId, $start, $end)
    {
        return view('appointments::book.create', compact('medicalTeamId', 'start', 'end'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'medical_team_id' => 'required|exists:medical_team,id',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Appointment::create($data);

        return redirect()->route('appointments')->with('success', 'Appointment created successfully');
    }

    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'cancelled';
        $appointment->save();

        return back()->with('success', 'Appointment cancelled.');
    }

    public function edit(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($request->all());

        return back()->with('success', 'Appointment updated.');
    }

    public function markMissed($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'missed';
        $appointment->save();

        return back()->with('success', 'Marked as missed.');
    }

    public function attended($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'attended';
        $appointment->save();

        return back()->with('success', 'Marked as attended.');
    }

    public function accept($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'accepted';
        $appointment->save();

        return back()->with('success', 'Appointment accepted.');
    }

    public function bookAppointment()
    {
        return view('appointments::book.index');
    }
}