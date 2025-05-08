<?php

use Illuminate\Support\Facades\Route;
use Modules\Subscription\app\Http\Controllers\SubscribeController;
use Modules\Subscription\app\Http\Controllers\PlanController;
use Modules\Subscription\app\Http\Controllers\FeatureController;
use Modules\Subscription\app\Http\Controllers\InvoiceController;
use Modules\Subscription\app\Http\Controllers\PaymentController;
use Modules\Subscription\app\Http\Controllers\CheckoutController;
use Modules\Subscription\app\Http\Controllers\OrderController;
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
  //Routes pour les abonnements :

Route::get('/subscriptions', [SubscribeController::class, 'index'])->name('subscriptions.index');
Route::post('/subscriptions/subscribe', [SubscribeController::class, 'subscribe'])->name('subscriptions.subscribe');
Route::get('/my-subscription', [SubscribeController::class, 'mySubscription'])->name('subscriptions.my');
Route::middleware('auth')->prefix('orders')->group(function () {
  Route::get('/', [OrderController::class, 'index'])->name('orders.index');
  Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
});

Route::middleware('auth')->prefix('payments')->group(function () {
  Route::get('/', [PaymentController::class, 'index'])->name('payments.index');
  Route::get('/{id}', [PaymentController::class, 'show'])->name('payments.show');
});


// Routes pour les plans
    // Routes pour les plans
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{plan}', [PlanController::class, 'show'])->name('plans.show');
    Route::get('/plans/{plan}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{plan}', [PlanController::class, 'update'])->name('plans.update');  // Ajoutez cette route si vous n'en avez pas pour les mises à jour
    Route::delete('/plans/{plan}', [PlanController::class, 'destroy'])->name('plans.destroy');

    // Affichage des plans côté 
    Route::get('/plans-frontend', [SubscribeController::class, 'showFrontendPlans'])->name('mediplus.plans');
    Route::get('/subscribe/checkout/{planId}', [SubscribeController::class, 'checkout'])
    ->name('mediplus.checkout');

    Route::post('/subscribe/pay', [SubscribeController::class, 'pay'])->name('plans.pay');

    

 //les features
 Route::get('/features', [FeatureController::class, 'index'])->name('features.index');
 Route::get('/features/create', [FeatureController::class, 'create'])->name('features.create');
 Route::post('/features', [FeatureController::class, 'store'])->name('features.store');
 Route::get('/features/{id}/edit', [FeatureController::class, 'edit'])->name('features.edit');
 Route::put('/features/{id}', [FeatureController::class, 'update'])->name('features.update');
 Route::delete('/features/{id}', [FeatureController::class, 'destroy'])->name('features.destroy');







 Route::get('/dashboard/packages', [PlanController::class, 'indexfront'])->name('dashboard.packages');
 Route::get('/checkout/{planId}', [CheckoutController::class, 'show'])->name('checkout.show');

 Route::middleware(['auth'])->group(function () {
  Route::get('/checkout/prepare/{planId}', [CheckoutController::class, 'show'])->name('checkout.prepare');
});


Route::prefix('invoices')->middleware(['auth'])->group(function () {
    Route::get('/', [InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/{id}', [InvoiceController::class, 'show'])->name('invoices.show');
});






