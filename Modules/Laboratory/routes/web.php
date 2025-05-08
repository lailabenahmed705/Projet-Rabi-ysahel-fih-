<?php

use Illuminate\Support\Facades\Route;
use Modules\Laboratory\app\Http\Controllers\LaboratoryController;

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

Route::prefix('laboratory')->name('laboratory.')->group(function () {
    Route::get('/', [LaboratoryController::class, 'index'])->name('index');
    Route::get('/create', [LaboratoryController::class, 'createForm'])->name('createForm');
    Route::post('/store', [LaboratoryController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [LaboratoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [LaboratoryController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [LaboratoryController::class, 'destroy'])->name('destroy');
});
