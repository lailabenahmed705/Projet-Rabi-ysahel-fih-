<?php

use Illuminate\Support\Facades\Route;
use Modules\Pharmacy\app\Http\Controllers\PharmacyController;

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


Route::prefix('pharmacy')->group(function () {
    Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.pharmacy');
    Route::get('/create', [PharmacyController::class, 'createForm'])->name('pharmacy.createForm');
    Route::post('/store', [PharmacyController::class, 'store'])->name('pharmacy.store');
    Route::get('/edit/{id}', [PharmacyController::class, 'edit'])->name('pharmacy.edit');
    Route::put('/update/{id}', [PharmacyController::class, 'update'])->name('pharmacy.update');
    Route::delete('/{id}', [PharmacyController::class, 'destroy'])->name('pharmacy.destroy');
});

