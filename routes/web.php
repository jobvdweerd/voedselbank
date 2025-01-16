<?php

use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KlantController;

Route::get('/klantengegevens', [KlantController::class, 'index'])->middleware(['auth', 'verified'])->name('klantengegevens');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/klantengegevens', function () {
    return view('klantengegevens');
})->middleware(['auth', 'verified'])->name('klantengegevens');
Route::get('/planning', function () {
    return view('planning');
})->middleware(['auth', 'verified'])->name('planning');
Route::post('/planning', [PlanningController::class, 'store'])->name('planning.store');
Route::get('/dagrooster', function () {
    $planning = \App\Models\Planning::all();
    return view('dagrooster', compact('planning'));
})->middleware(['auth', 'verified'])->name('dagrooster');
Route::get('/dagrooster', [PlanningController::class, 'showDagrooster'])->middleware(['auth', 'verified'])->name('dagrooster');

require __DIR__.'/auth.php';
Route::middleware([CheckRole::class . ':' . User::ROLE_MANAGER])->group(function () {
    Route::get('/managerooster', [PlanningController::class, 'showManagerPlanning'])->middleware(['auth', 'verified'])->name('managerooster');
    Route::post('/managerooster/update', [PlanningController::class, 'update'])->name('managerooster.update');
    Route::patch('/planning/{planning}/updateStatus', [PlanningController::class, 'updateStatus'])->name('planning.updateStatus');
});
Route::middleware([CheckRole::class . ':' . User::ROLE_MANAGER])->group(function () {
        Route::get('/klant/{klant}/edit', [KlantController::class, 'edit'])->name('klant.edit');
        Route::put('/klant/{klant}', [KlantController::class, 'update'])->name('klant.update');
    Route::get('/maandrooster', function () {
        $planning = \App\Models\Planning::all();
        return view('maandrooster', compact('planning'));
    })->middleware(['auth', 'verified'])->name('maandrooster');
    Route::get('/managerooster', function () {
        $planning = \App\Models\Planning::all();
        return view('managerooster', compact('planning'));
    })->middleware(['auth', 'verified'])->name('managerooster');
    Route::post('/managerooster/update', [PlanningController::class, 'update'])->name('managerooster.update');
    Route::post('/klant/{klant}/toggleActive', [KlantController::class, 'toggleActive'])->name('klant.toggleActive');
});

Route::middleware([CheckRole::class . ':' . User::ROLE_MANAGER])->group(function () {
    Route::get('/klantengegevens', [KlantController::class, 'index'])->middleware(['auth', 'verified'])->name('klantengegevens');
    Route::get('/klant/create', [KlantController::class, 'create'])->name('klant.create');
    Route::post('/klant', [KlantController::class, 'store'])->name('klant.store');
    Route::get('/klant/{klant}/edit', [KlantController::class, 'edit'])->name('klant.edit');
    Route::put('/klant/{klant}', [KlantController::class, 'update'])->name('klant.update');
    Route::post('/klant/{klant}/inactive', [KlantController::class, 'setInactive'])->name('klant.inactive');
    Route::put('/klant/{klant}/update-package', [KlantController::class, 'updatePackage'])->name('klant.updatePackage');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/planning/requests', [PlanningController::class, 'index']);
    Route::post('/planning/approve/{id}', [PlanningController::class, 'approve']);
    Route::post('/planning/reject/{id}', [PlanningController::class, 'reject']);
});
