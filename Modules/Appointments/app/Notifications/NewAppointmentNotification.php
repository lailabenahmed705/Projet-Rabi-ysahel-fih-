<?php

namespace Modules\Appointments\App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewAppointmentNotification extends Notification
{
    use Queueable;

    public $appointment;

    public function __construct($appointment)
    {
        $this->appointment = $appointment;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
{
    return [
        'title'          => 'Nouveau rendez-vous',
        'body'           => 'Un patient a pris un rendez-vous pour le ' . $this->appointment->scheduled_at->format('d/m/Y H:i'),
        'appointment_id' => $this->appointment->id,
        'patient_name'   => $this->appointment->patient->name ?? 'Inconnu',
        'date'           => $this->appointment->availability_date,
        'time'           => $this->appointment->availability_time,
        'service_name'   => optional($this->appointment->service)->name,
    ];
}

}
