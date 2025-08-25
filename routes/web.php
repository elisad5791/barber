<?php

use App\Http\Controllers\CabinetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SalonController;
use App\Http\Controllers\TimeslotController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('/salon/{salonId}', [WelcomeController::class, 'showSalon'])->name('welcome.salon')->middleware('salon-paid');
Route::get('/master/{masterId}', [WelcomeController::class, 'showMaster'])->name('welcome.master')->middleware('master-salon-paid');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/timeslots/{masterId}', [TimeslotController::class, 'getTimeslots'])->name('dashboard.timeslots');

Route::post('/notification', [App\Http\Controllers\PaymentController::class, 'update'])->name('notification');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cabinet', [CabinetController::class, 'index'])->name('cabinet');
    Route::get('/cabinet/reviews', [CabinetController::class, 'reviews'])->name('cabinet.reviews');
    Route::get('/cabinet/payments', [CabinetController::class, 'payments'])->name('cabinet.payments');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/service', [DashboardController::class, 'storeService'])->name('dashboard.service.add');

    Route::get('/dashboard/master/create', [MasterController::class, 'create'])->name('dashboard.master.create');
    Route::get('/dashboard/master/{masterId}', [MasterController::class, 'show'])->name('dashboard.master.show');
    Route::get('/dashboard/master/schedule/{masterId}', [MasterController::class, 'schedule'])->name('dashboard.master.schedule');
    Route::post('/dashboard/master', [MasterController::class, 'store'])->name('dashboard.master.store');
    Route::delete('/dashboard/master/{masterId}', [MasterController::class, 'delete'])->name('dashboard.master.delete');

    Route::get('/dashboard/salon/edit', [SalonController::class, 'edit'])->name('dashboard.salon.edit');
    Route::patch('/dashboard/salon/update', [SalonController::class, 'update'])->name('dashboard.salon.update');

    Route::post('/timeslots', [TimeslotController::class, 'store'])->name('dashboard.timeslots.store');
    Route::delete('/timeslots', [TimeslotController::class, 'delete'])->name('dashboard.timeslots.delete');
    Route::patch('/timeslots', [TimeslotController::class, 'update'])->name('welcome.timeslots.update');
    Route::patch('/timeslots/cancel', [TimeslotController::class, 'cancel'])->name('welcome.timeslots.cancel');

    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{reviewId}', [ReviewController::class, 'delete'])->name('reviews.delete');

    Route::get('/payment/{salonId}', [PaymentController::class, 'store'])->name('pay');
});

require __DIR__.'/auth.php';
