<?php

use App\Http\Controllers\DashboardController;
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
        Route::get('/', [ProyekDataController::class, 'index'])->name('dashboard.index');
});

Route::prefix('dashboard')->middleware(['auth', 'verified'])->group(function (){
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
});

require __DIR__.'/auth.php';
