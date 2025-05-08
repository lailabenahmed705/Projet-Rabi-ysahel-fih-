<?php

use Illuminate\Support\Facades\Route;
use Modules\Service\app\Http\Controllers\ServiceController;
use Modules\Service\app\Http\Controllers\MedicalTypeController;
use Modules\Service\app\Http\Controllers\ServiceCategoryController;
use Modules\Service\app\Http\Controllers\ServiceSubCategoryController;


    // Routes pour les types médicaux
    Route::get('/medical-type', [MedicalTypeController::class, 'index'])->name('medical-type.index');
    Route::get('/medical-type/create', [MedicalTypeController::class, 'createForm'])->name('medical-type.createForm');
    Route::post('/medical-type/store', [MedicalTypeController::class, 'store'])->name('medical-type.store');
    Route::get('/medical-type/edit/{id}', [MedicalTypeController::class, 'editForm'])->name('medical-type.editForm');
    Route::put('/medical-type/{id}', [MedicalTypeController::class, 'update'])->name('medical-type.update');
    Route::delete('/medical-type/{id}', [MedicalTypeController::class, 'destroy'])->name('medical-type.destroy');

    // Routes pour les services
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'createForm'])->name('service.createForm');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');
    
    // Routes pour les catégories de service
    Route::get('/service-category', [ServiceCategoryController::class, 'index'])->name('service-category.service-category');
    Route::get('/service-category/create', [ServiceCategoryController::class, 'createForm'])->name('service-category.createForm');
    Route::post('/service-category/store', [ServiceCategoryController::class, 'store'])->name('service-category.store');
    Route::get('/service-category/edit/{id}', [ServiceCategoryController::class, 'edit'])->name('service-category.edit');
    Route::put('/service-category/{id}', [ServiceCategoryController::class, 'update'])->name('service-category.update');
    Route::delete('/service-category/{id}', [ServiceCategoryController::class, 'destroy'])->name('service-category.destroy');

     // Afficher la liste des subcategories
     Route::get('service-subcategories', [ServiceSubCategoryController::class, 'index'])->name('service-subcategories.index');

    // Afficher le formulaire de création d'une subcategory
     Route::get('service-subcategories/create', [ServiceSubCategoryController::class, 'create'])->name('service-subcategories.create');

    // Enregistrer une nouvelle subcategory
     Route::post('service-subcategories', [ServiceSubCategoryController::class, 'store'])->name('service-subcategories.store');

     Route::get('service-subcategories/{service_subcategory}/edit', [ServiceSubCategoryController::class, 'edit'])->name('service-subcategories.edit');

     Route::delete('service-subcategories/{service_subcategory}/destroy', [ServiceSubCategoryController::class, 'destroy'])->name('service-subcategories.destroy');

