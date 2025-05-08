<?php

namespace  app\Console;

use Illuminate\Console\Command;
use Modules\Appointments\App\Models\Appointment;
use Carbon\Carbon;

class SendAppointmentReminders extends Command
{
    protected $signature = 'appointments:send-reminders';
    protected $description = 'Envoyer des rappels pour les rendez-vous à venir.';

    public function handle()
    {
        $tomorrow = Carbon::tomorrow();

        $appointments = Appointment::whereDate('date', $tomorrow)->get();

        foreach ($appointments as $appointment) {
            // Simuler l'envoi d'un rappel (ex: email ou notification)
            $this->info("Rappel envoyé pour le rendez-vous #{$appointment->id}");
        }

        return 0;
    }
}
