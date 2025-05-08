<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Modules\Appointments\app\Models\Appointment;
use Illuminate\Support\Facades\Auth;

class MedicalCalendar extends Component
{
    public $appointments;

    public function mount()
    {
        $this->loadAppointments();
    }

    public function loadAppointments()
    {
        $this->appointments = Appointment::where('doctor_id', Auth::id())->get();
    }

    public function render()
    {
        return view('livewire.medical-calendar');
    }
}
