<?php

use Illuminate\Support\Facades\Route;

use Modules\Patient\App\Http\Controllers\DashboardClientController;


    Route::get('patient/dashboard', [DashboardClientController::class, 'showdash'])->name('patient.dashboard');
    Route::get('patient/account-setting', [DashboardClientController::class, 'showaccountsetting'])->name('patient.account.setting');
    Route::get('patient/profile-setting', [DashboardClientController::class, 'showprofilesetting'])->name('patient.profile.setting');
    Route::put('patient/update-profile', [DashboardClientController::class, 'updateProfile'])->name('patient.profile.update');
    Route::post('patient/update-location', [DashboardClientController::class, 'updateLocation'])->name('patient.location.update');
    Route::get('patient/appointments', [DashboardClientController::class, 'appointment'])->name('patient.appointments');

