<?php

use Illuminate\Support\Facades\Route;
use Modules\Permission\app\Http\Controllers\PermissionController;
use Modules\Permission\app\Http\Controllers\RoleController;

Route::middleware(['web', 'auth'])->prefix('admin')->group(function () {
    Route::resource('permissions', PermissionController::class)->only(['index', 'show']);
    Route::resource('roles', RoleController::class); // Full CRUD
});
