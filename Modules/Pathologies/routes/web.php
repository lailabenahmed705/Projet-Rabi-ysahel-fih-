<?php

use Illuminate\Support\Facades\Route;
use Modules\Pathologies\app\Http\Controllers\PathologyTeamController;

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

/*Route::group([], function () {
    Route::resource('pathologies', PathologiesController::class)->names('pathologies');
});*/
 // Routes pour les pathologies
    Route::get('/pathology', [PathologyTeamController::class, 'index'])->name('pathology-team.pathology-team');
    Route::get('/pathology/create', [PathologyTeamController::class, 'createForm'])->name('pathology.createForm');
    Route::get('/pathology/show/{id}', [PathologyTeamController::class, 'show'])->name('pathology.show');
    Route::post('/pathology/store', [PathologyTeamController::class, 'store'])->name('pathology.store');
    Route::get('/pathology/edit/{id}', [PathologyTeamController::class, 'edit'])->name('pathology.edit');
    Route::put('/pathology/update/{id}', [PathologyTeamController::class, 'update'])->name('pathology.update');
    Route::delete('/pathology/{id}', [PathologyTeamController::class, 'destroy'])->name('pathology.destroy');

