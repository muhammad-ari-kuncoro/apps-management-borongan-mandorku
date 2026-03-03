<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForemanProjectController;
use App\Http\Controllers\ManPowerProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyekDataController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('i');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('proyek')->middleware(['auth', 'verified'])->group(function (){
      Route::get('/',           [ProyekDataController::class, 'index'])->name('proyek.index');
      Route::get('/create',     [ProyekDataController::class, 'create'])->name('proyek.create');
      Route::post('/store',     [ProyekDataController::class, 'store'])->name('proyek.store');
});

Route::prefix('foreman')->middleware(['auth', 'verified'])->group(function (){
      Route::get('/',            [ForemanProjectController::class, 'index'])->name('foreman.index');
      Route::get('/create',      [ForemanProjectController::class, 'create'])->name('foreman.create');
      Route::post('/store',      [ForemanProjectController::class, 'store'])->name('foreman.store');
      Route::get('/edit/{id}',   [ForemanProjectController::class, 'edit'])->name('foreman.edit');
      Route::put('/update/{id}', [ForemanProjectController::class, 'update'])->name('foreman.update');
      Route::delete('/delete/foreman/{id}', [ForemanProjectController::class, 'destroy'])->name('foreman.delete');
});

Route::prefix('manpower')->middleware(['auth','verified'])->group(function (){
      Route::get('/',           [ManPowerProjectController::class, 'index'])->name('manpower.index');
      Route::get('/create',     [ManPowerProjectController::class, 'create'])->name('manpower.create');
});


Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function (){
      Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

require __DIR__.'/auth.php';
