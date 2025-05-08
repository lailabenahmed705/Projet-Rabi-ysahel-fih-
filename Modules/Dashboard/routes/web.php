<?php

use Illuminate\Support\Facades\Route;
use Modules\Dashboard\app\Http\Controllers\DashboardController;
use Modules\Service\app\Http\Controllers\ServiceController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group([], function () {
    Route::resource('dashboard', DashboardController::class)->names('dashboard');
});

 // pour dashboard
 Route::get('/dashboard', [DashboardController::class, 'showdash'])->name('dashboard');
 Route::get('/viewmyprofile', [DashboardController::class, 'showmyprofile'])->name('showmyprofile');
 Route::post('/profile/update-photo', [DashboardController::class, 'updatePhoto'])->name('profile.update.photo');
// web.php (routes)
Route::post('/profile/update-photo', [DashboardController::class, 'updatePhoto'])->name('profile.update.photo');
Route::post('/profile/update-education', [DashboardController::class, 'updateEducation'])->name('profile.update.education');
Route::post('/profile/update-experience', [DashboardController::class, 'updateExperience'])->name('profile.update.experience');
Route::post('/profile/update-achievements', [DashboardController::class, 'updateAchievements'])->name('profile.update.achievements');


 Route::get('/profilesetting', [DashboardController::class, 'showprofilesetting'])->name('profilesetting');
 Route::put('/update-profile', [DashboardController::class, 'updateProfile'])->name('update.profile');
 Route::get('/update-profile', [DashboardController::class, 'updateProfile'])->name('update.profile');
 Route::post('/update-location', [DashboardController::class, 'updateLocation'])->name('update.location');
 Route::post('/store-data', [DashboardController::class, 'storeEdCer'])->name('storeData');
 Route::post('/pathology-team/store', [DashboardController::class, 'storePathologyTeam'])->name('pathologyTeam.store');
 Route::post('/timeslots/generate', [DashboardController::class, 'generateTimeSlots'])->name('timeslots.generate');
 Route::match(['post', 'put'],'/accountsetting', [DashboardController::class, 'showaccountsetting'])->name('accountsetting');
 Route::get('/accountsetting', [DashboardController::class, 'showaccountsetting'])->name('accountsetting');
 Route::post('/update-calendar', [DashboardController::class,'updateCalendar'])->name('update.calendar');
 Route::post('/update-workdays', [DashboardController::class, 'updateWorkdays'])->name('update.workdays');
 Route::get('/reservation/create',[DashboardController::class, 'create'])->name('reservation.create');
 Route::put('/update-email', [DashboardController::class, 'update'])->name('update.email');
 Route::put('/update-password', [DashboardController::class, 'updatePassword'])->name('update.password');
 Route::post('/delete-account', [DashboardController::class, 'deleteAccount'])->name('delete.account');
 Route::get('/feedbacks', [DashboardController::class, 'showfeedbacks'])->name('feedbacks');
 Route::get('/invoices', [DashboardController::class, 'showinvoices'])->name('invoices');
 Route::get('/appoint', [DashboardController::class, 'showappointments'])->name('appointments');
 Route::get('/packages', [DashboardController::class, 'showpackages'])->name('packages');
 Route::get('/show-ed-cer', [DashboardController::class, 'showEdCer'])->name('show.edcer');
 Route::get('/spec-and-serv', [ServiceController::class, 'showspecandserv'])->name('specandserv');
 Route::post('/add-new-service-and-subservices', [ServiceController::class, 'addNewServiceAndSubServices'])->name('addNewServiceAndSubServices');
 Route::post('/delete-service-and-subservces', [ServiceController::class, 'deleteServiceAndSubServices'])->name('deleteServiceAndSubServices');
 Route::post('/delete-subservice', [ServiceController::class, 'deleteSubService'])->name('deleteSubService');
 Route::get('/payouts', [DashboardController::class, 'showpayouts'])->name('payouts');
 Route::post('/feedback', [FeedbacksController::class,'store'])->name('feedback.store');

