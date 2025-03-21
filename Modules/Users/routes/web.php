<?php


use Illuminate\Support\Facades\Route;
use Modules\Users\App\Http\Controllers\MedicalTeamController;
use Modules\Users\App\Http\Controllers\CompanyController;
use Modules\Users\App\Http\Controllers\RoleController;
use Modules\Users\App\Http\Controllers\ProfileRoleController;
use Modules\Users\App\Http\Controllers\RolePermissionController;





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
    Route::resource('users', UsersController::class)->names('users');

});
// Routes accessibles via l'interface web
Route::get('/users', [UsersController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
*/




//Medical team
Route::get('/create-medical-team', [MedicalTeamController::class, 'index'])->name('create-medical-team');
Route::post('/medical-team/store', [MedicalTeamController::class, 'store'])->name('medical-team.store');

Route::get('/get-states-by-country/{countryId}', [MedicalTeamController::class, 'getStatesByCountry']);
Route::get('/get-dependencies-by-state/{stateId}', [MedicalTeamController::class, 'getDependenciesByState']);
//Route::get('/get-services-by-medical-type/{id}',  [MedicalTeamController::class, 'getServicesByMedicalType'])->name('medical-team.service');
//Route::get('/get-subservices-by-service-category/{id}',  [MedicalTeamController::class, 'getSubServicesByServiceCategory'])->name('medical-team.subservice.category');
Route::get('/medical-team/show/{medicalTypeSlug}', [MedicalTeamController::class, 'showFilteredTeam'])->name('medical-team.showFiltered');
Route::get('/medical-team/{id}', [MedicalTeamController::class, 'showTeamDetails'])->name('medical-team.showDetails');
Route::get('/medical-team/{id}/edit', [MedicalTeamController::class, 'editForm'])->name('medical-team.editForm');
Route::delete('/medical-team/{id}', [MedicalTeamController::class, 'destroy'])->name('medical-team.destroy');
Route::put('/medical-team/{id}/update', [MedicalTeamController::class, 'updateTeamData'])->name('medical-team.update');

// Routes pour les pharmacies
Route::get('/pharmacy', [PharmacyController::class, 'index'])->name('pharmacy.pharmacy');
Route::get('/pharmacy/create', [PharmacyController::class, 'createForm'])->name('pharmacy.createForm');
Route::post('/pharmacy/store', [PharmacyController::class, 'store'])->name('pharmacy.store');
Route::get('/pharmacy/edit/{id}', [PharmacyController::class, 'edit'])->name('pharmacy.edit');
Route::put('/pharmacy/update/{id}', [PharmacyController::class, 'update'])->name('pharmacy.update');
Route::delete('/pharmacy/{id}', [PharmacyController::class, 'destroy'])->name('pharmacy.destroy');

// Routes pour les laboratoires
Route::get('/laboratory', [LaboratoryController::class, 'index'])->name('laboratory.laboratory');
Route::get('/laboratory/create', [LaboratoryController::class, 'createForm'])->name('laboratory.createForm');
Route::post('/laboratory/store', [LaboratoryController::class, 'store'])->name('laboratory.store');
Route::get('/laboratory/edit/{id}', [LaboratoryController::class, 'edit'])->name('laboratory.edit');
Route::put('/laboratory/update/{id}', [LaboratoryController::class, 'update'])->name('laboratory.update');
Route::delete('/laboratory/{id}', [LaboratoryController::class, 'destroy'])->name('laboratory.destroy');

// Routes pour les pathologies
Route::get('/pathology', [PathologyTeamController::class, 'index'])->name('pathology-team.pathology-team');
Route::get('/pathology/create', [PathologyTeamController::class, 'createForm'])->name('pathology.createForm');
Route::get('/pathology/show/{id}', [PathologyTeamController::class, 'show'])->name('pathology.show');
Route::post('/pathology/store', [PathologyTeamController::class, 'store'])->name('pathology.store');
Route::get('/pathology/edit/{id}', [PathologyTeamController::class, 'edit'])->name('pathology.edit');
Route::put('/pathology/update/{id}', [PathologyTeamController::class, 'update'])->name('pathology.update');
Route::delete('/pathology/{id}', [PathologyTeamController::class, 'destroy'])->name('pathology.destroy');

//Routes pour les compagnies
Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
Route::get('/company/create', [CompanyController::class, 'createForm'])->name('company.createForm');
Route::post('/company/store', [CompanyController::class, 'store'])->name('company.store');
Route::get('/company/edit/{id}', [CompanyController::class, 'editForm'])->name('company.editForm');
Route::put('/company/{id}', [CompanyController::class, 'update'])->name('company.update');
Route::delete('/company/{id}', [CompanyController::class, 'destroy'])->name('company.destroy');



/*Route::get('/company', [CompanyController::class, 'index'])->name('Users::company.index');
Route::get('/company/create', [CompanyController::class, 'createForm'])->name('Users::company.createForm');
Route::post('/company/store', [CompanyController::class, 'store'])->name('Users::company.store');
Route::get('/company/edit/{id}', [CompanyController::class, 'editForm'])->name('Users::company.editForm');
Route::put('/company/{id}', [CompanyController::class, 'update'])->name('Users::company.update');
Route::delete('/company/{id}', [CompanyController::class, 'destroy'])->name('Users::company.destroy');
*/

 // les rôles
 Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
 Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
 Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
 Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
 Route::put('roles/{id}', [RoleController::class,'update'])->name('roles.update');
 Route::get('/roles/{role}/show', [RoleController::class, 'show'])->name('roles.show');
 Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

  // Profile roles routes
Route::get('/profileroles', [ProfileRoleController::class, 'index'])->name('profileroles.index');
Route::get('/profileroles/create', [ProfileRoleController::class, 'create'])->name('profileroles.create');
Route::post('/profileroles', [ProfileRoleController::class, 'store'])->name('profileroles.store');
Route::get('/profileroles/{profileRole}/edit', [ProfileRoleController::class, 'edit'])->name('profileroles.edit');
Route::put('/profileroles/{profileRole}', [ProfileRoleController::class, 'update'])->name('profileroles.update');
Route::get('/profileroles/{profileRole}/show', [ProfileRoleController::class, 'show'])->name('profileroles.show');
Route::delete('/profileroles/{profileRole}', [ProfileRoleController::class, 'destroy'])->name('profileroles.destroy');

// Ajoutez cette ligne pour la route du profil
//Route::get('/profile', [RoleController::class, 'show'])->name('profile.show');


Route::get('/role_permissions', [RolePermissionController::class, 'index'])->name('role_permissions.index');
Route::post('/role_permissions', [RolePermissionController::class, 'store'])->name('role_permissions.store');


//Route::prefix('users')->group(function() {
  //  Route::get('/', 'UsersController@index');
//});
