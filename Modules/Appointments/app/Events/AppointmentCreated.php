<?php

namespace Modules\Appointments\App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Appointments\App\Models\Appointment;

class AppointmentCreated
{
    use Dispatchable, SerializesModels;

    public $appointment;

    public function __construct(Appointment $appointment)
    {
        $this->appointment = $appointment;
    }
}
