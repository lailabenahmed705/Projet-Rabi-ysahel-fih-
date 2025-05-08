<?php

use Illuminate\Support\Facades\Route;
use Modules\International\app\Http\Controllers\InternationalController;
use Modules\International\app\Http\Controllers\LocationController;
use Modules\International\app\Http\Controllers\TaxController;
use Modules\International\app\Http\Controllers\TaxRulesController;
use Modules\International\app\Http\Controllers\CurrencyController;
use Modules\International\app\Http\Controllers\GeolocationController;

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

Route::prefix('/')->group(function () {
    //Route::get('/', 'InternationalController@index');
    // Routes pour les pays
    Route::get('/locations/countries', [LocationController::class, 'index'])->name('locations.countries.index');
    Route::post('/locations/countries/store', [LocationController::class, 'storeCountry'])->name(
      'locations.countries.store'
    );
    Route::get('/locations/countries/create', [LocationController::class, 'createCountry'])->name(
      'locations.countries.create'
    );
  
    Route::get('/locations/countries/{country}/edit', [LocationController::class, 'editCountry'])->name(
      'locations.countries.edit'
    );
    Route::delete('/countries/{country}', [LocationController::class, 'destroyCountry'])->name('locations.countries.destroy');

  
    Route::patch('/locations/countries/{country}', [LocationController::class, 'updateCountry'])->name(
      'locations.countries.update'
    );
  
    // Routes pour les états
  
    Route::get('/locations/states', [LocationController::class, 'showStates'])->name('locations.states.index');
    Route::get('/locations/states/create', [LocationController::class, 'createState'])->name('locations.states.create');
    Route::post('/locations/states/store', [LocationController::class, 'storeState'])->name('locations.states.store');
    Route::delete('/locations/states/{state}', [LocationController::class, 'destroy'])->name('locations.states.destroy');
  
    Route::get('/locations/states/{state}/edit', [LocationController::class, 'editState'])->name('locations.states.edit');
    Route::patch('/locations/states/{state}', [LocationController::class, 'updateState'])->name(
      'locations.states.update'
    );
    // Routes pour les dépendances
    Route::get('/locations/dependencies', [LocationController::class, 'showDependencies'])->name(
      'locations.dependencies.index'
    );
    Route::delete('/locations/dependencies/{dependency}', [LocationController::class, 'destroyDependency'])->name(
      'locations.dependencies.destroy'
    );
    Route::get('/locations/dependencies/{dependency}/edit', [LocationController::class, 'editDependency'])->name(
      'locations.dependencies.edit'
    );
    Route::patch('/locations/dependencies/{dependency}', [LocationController::class, 'updateDependency'])->name(
      'locations.dependencies.update'
    );
  
    // Routes pour les villes
    Route::get('/locations/cities', [LocationController::class, 'showCities'])->name('locations.cities.index');
    Route::get('/locations/cities/create', [LocationController::class, 'createCity'])->name('locations.cities.create');
    Route::post('/locations/cities/store', [LocationController::class, 'storeCity'])->name('locations.cities.store');
    Route::delete('/locations/cities/{city}', [LocationController::class, 'destroyCity'])->name(
      'locations.cities.destroy'
    );
    Route::get('/locations/cities/{city}/edit', [LocationController::class, 'editCity'])->name('locations.cities.edit');
    Route::patch('/locations/cities/{city}', [LocationController::class, 'updateCity'])->name('locations.cities.update');
    // Taxes routes
    Route::get('/tax-management', [TaxController::class, 'taxManagement'])->name('tax.management');
    Route::get('/taxes', [TaxController::class, 'index'])->name('taxes.index');
    Route::get('/taxes/create', [TaxController::class, 'create'])->name('taxes.create');
    Route::post('/taxes', [TaxController::class, 'store'])->name('taxes.store');
    Route::delete('/taxes/{tax}', [TaxController::class, 'destroy'])->name('taxes.destroy');
    Route::get('taxes/{tax}/edit', [TaxController::class, 'edit'])->name('taxes.edit');
    Route::put('taxes/{tax}', [TaxController::class, 'update'])->name('taxes.update');
    // Routes pour les règles de taxe
    Route::get('/taxrules', [TaxRulesController::class, 'index'])->name('taxrules.index');
    Route::get('/taxrules/create', [TaxRulesController::class, 'create'])->name('taxrules.create');
    Route::post('/taxrules', [TaxRulesController::class, 'store'])->name('taxrules.store');
    Route::delete('/taxrules/{taxRule}', [TaxRulesController::class, 'destroy'])->name('taxrules.destroy');
    Route::get('taxrules/{taxRule}/edit', [TaxRulesController::class, 'edit'])->name('taxrules.edit');
    Route::put('taxrules/{taxRule}', [TaxRulesController::class, 'update'])->name('taxrules.update');
    Route::get('/currencies', [CurrencyController::class, 'index'])->name('currencies.index');
    Route::post('/currencies/add', [CurrencyController::class, 'store'])->name('currencies.store');
    Route::delete('/currencies/{currency}', [CurrencyController::class, 'destroy'])->name('currencies.destroy');
    Route::get('currencies/create', [CurrencyController::class, 'create'])->name('currencies.create');
    Route::get('currencies/{currency}/toggleActive', [CurrencyController::class, 'toggleActive'])->name(
      'currencies.toggleActive'
    );
    Route::get('currencies/{currency}/setDefault', [CurrencyController::class, 'setDefault'])->name(
      'currencies.setDefault'
    );
    //Routes pour la géolication
    Route::resource('geolocations', GeolocationController::class);
  });




