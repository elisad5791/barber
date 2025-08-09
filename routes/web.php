<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/service', [DashboardController::class, 'storeService'])->name('dashboard.service.add');

    Route::get('/dashboard/master/create', [MasterController::class, 'create'])->name('dashboard.master.create');
    Route::get('/dashboard/master/{masterId}', [MasterController::class, 'show'])->name('dashboard.master.show');
    Route::get('/dashboard/master/schedule/{masterId}', [MasterController::class, 'schedule'])->name('dashboard.master.schedule');
    Route::post('/dashboard/master', [MasterController::class, 'store'])->name('dashboard.master.store');
    Route::delete('/dashboard/master/{masterId}', [MasterController::class, 'delete'])->name('dashboard.master.delete');

    Route::get('/dashboard/salon/edit', [SalonController::class, 'edit'])->name('dashboard.salon.edit');
    Route::patch('/dashboard/salon/update', [SalonController::class, 'update'])->name('dashboard.salon.update');
});

require __DIR__.'/auth.php';
