<?php

namespace Modules\Appointments\app\Services;

use Modules\Appointments\app\Models\Appointment;
use Modules\Users\app\Models\Patient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AppointmentService
{
    /**
     * Créer un nouvel Appointment avec Patient
     */
    public function createAppointment(array $data)
    {
        return DB::transaction(function () use ($data) {
            // Création du patient
            $patient = Patient::create([
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'email' => $data['email'] ?? null,
                'gender' => $data['gender'],
                'user_id' => auth()->id(),
            ]);

            // Upload ordonnance si elle existe
            $ordonnancePath = null;
            if (isset($data['ordonnance']) && $data['ordonnance']->isValid()) {
                $ordonnancePath = $data['ordonnance']->store('ordonnances', 'public');
            }

            // Création de l'appointment
              $appointment = Appointment::create([
                'medical_team_id' => $data['medical_team_id'],
                'service_category_id' => $data['service_category_id'],
                'service_id' => $data['service_id'],
                'care_type' => $data['care_type'],
                'appointment_location' => $data['appointment_location'],
                'availability_date' => $data['availability_date'],
                'availability_time' => $data['availability_time'],
                'description' => $data['description'] ?? null,
                'ordonnance' => $ordonnancePath,
                'phone' => $data['phone'],
                'confirm_phone' => $data['confirm_phone'],
                'patient_id' => $patient->id,
                'status' => 'pending',
            ]);

            return $appointment;
        });
    }

    /**
     * Supprimer un appointment
     */
    public function deleteAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return true;
    }

    /**
     * Retourner un Appointment par son ID
     */
    public function findAppointment($id)
    {
        return Appointment::findOrFail($id);
    }

    /**
     * Lister tous les appointments
     */
    public function listAppointments()
    {
        return Appointment::with(['medicalTeam.user', 'service', 'serviceCategory'])->get();
    }

    /**
     * Editer un appointment
     */
    public function updateAppointment($id, array $data)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->update($data);
        return $appointment;
    }
}
