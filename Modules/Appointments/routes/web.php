<?php

use Illuminate\Support\Facades\Route;
use Modules\Appointments\App\Http\Controllers\AppointmentController;
use Modules\Appointments\App\Http\Controllers\AvailabilityController;
use Modules\Appointments\App\Http\Controllers\AvailabilitySettingsController;
use Modules\Appointments\App\Http\Controllers\RestAppointmentsController;
use Modules\Appointments\App\Http\Controllers\SMSController;

/*
|--------------------------------------------------------------------------
| Web Routes - Appointments Module
|--------------------------------------------------------------------------
*/

//--------------------------- Appointment Routes --------------------------

Route::prefix('appointments')->name('appointments.')->group(function () {
    // Formulaire de création (Étape 1)
    Route::get('/step1', [AppointmentController::class, 'step1'])->name('step1');

    // Enregistrement du rendez-vous
    Route::post('/store', [AppointmentController::class, 'store'])->name('store');

    // Page de confirmation
    Route::get('/confirmation', [AppointmentController::class, 'confirmation'])->name('confirmation');

    // AJAX - Dépendances
    Route::get('/get-service-categories', [AppointmentController::class, 'getServiceCategoriesByMedicalType'])->name('getServiceCategoriesByMedicalType');
    Route::get('/get-services', [AppointmentController::class, 'getServicesByServiceCategory'])->name('getServicesByServiceCategory');
    Route::get('/get-availability', [AppointmentController::class, 'getAvailability'])->name('getAvailability');
    Route::get('/available-times', [AppointmentController::class, 'getAvailableTimes'])->name('available-times'); // 🔥 Ajouté pour AJAX disponibilité

    // Gestion des rendez-vous (CRUD)
    Route::get('/', [AppointmentController::class, 'index'])->name('index');
    Route::get('/{id}/edit', [AppointmentController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AppointmentController::class, 'update'])->name('update');
    Route::delete('/{id}', [AppointmentController::class, 'destroy'])->name('destroy');
});

//--------------------------- Availability Settings Routes --------------------------

Route::prefix('availability-settings')->name('availability-settings.')->group(function () {
    Route::get('/', [AvailabilitySettingsController::class, 'index'])->name('index');
    Route::get('/create', [AvailabilitySettingsController::class, 'create'])->name('create');
    Route::post('/', [AvailabilitySettingsController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [AvailabilitySettingsController::class, 'edit'])->name('edit');
    Route::put('/{medical_team_id}', [AvailabilitySettingsController::class, 'update'])->name('update');
    Route::delete('/{id}', [AvailabilitySettingsController::class, 'destroy'])->name('destroy');
});

//--------------------------- Availability Routes (créneaux horaires) --------------------------

Route::prefix('availability')->name('availability.')->group(function () {
    Route::get('/{medicalTeamId}', [AvailabilityController::class, 'index'])->name('index');
    Route::get('/create/{medicalTeamId}', [AvailabilityController::class, 'create'])->name('create');
    Route::post('/store/{medicalTeamId}', [AvailabilityController::class, 'store'])->name('store');
    Route::get('/timeslots/{medicalTeamId}', [AvailabilityController::class, 'generateTimeSlots'])->name('timeslots');
    Route::get('/{medicalTeamId}/timeslots', [AvailabilityController::class, 'showTimeSlots'])->name('showTimeSlots');
    Route::get('/slots', [AvailabilityController::class, 'getAvailabilitySlots'])->name('slots'); // Attention route pour fetch AJAX slots
});

//--------------------------- REST Appointments Management (Booking etc) --------------------------

Route::prefix('rest-appointments')->name('rest-appointments.')->group(function () {
    Route::get('/book', [RestAppointmentsController::class, 'bookAppointment'])->name('book');
    Route::match(['get', 'post'], '/book-appointment/{staff_id}', [RestAppointmentsController::class, 'bookAppointment'])->name('bookAppointment');
    Route::post('/bookings', [RestAppointmentsController::class, 'store'])->name('bookings.store');

    Route::get('/book-appointment/{medicalTeamId}/{start}/{end}', [RestAppointmentsController::class, 'create'])->name('create');
    Route::post('/appointments/{id}/cancel', [RestAppointmentsController::class, 'cancel'])->name('cancel');
    Route::post('/appointments/{id}/edit', [RestAppointmentsController::class, 'edit'])->name('edit');
    Route::post('/appointments/{id}/markmissed', [RestAppointmentsController::class, 'markMissed'])->name('markmissed');
    Route::post('/appointments/{id}/attended', [RestAppointmentsController::class, 'attended'])->name('attended');
    Route::post('/appointments/{id}/accept', [RestAppointmentsController::class, 'accept'])->name('accept');
});

//--------------------------- SMS Test --------------------------

Route::get('/test-sms', function () {
    try {
        $phone = '+21654128395'; // Remplacer avec un vrai numéro
        $message = 'This is a test message.';
        SMSController::sendSingleMessage($phone, $message);
        return 'Test SMS sent successfully!';
    } catch (Exception $e) {
        \Log::error('Error sending SMS: ' . $e->getMessage());
        return 'Error sending SMS: ' . $e->getMessage();
    }
});
