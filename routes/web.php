<?php

use App\Http\Controllers\PlanningController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckRole;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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

require __DIR__.'/auth.php';
Route::middleware([CheckRole::class . ':' . User::ROLE_MANAGER])->group(function () {
    Route::get('/maandrooster', function () {
        $planning = \App\Models\Planning::all();
        return view('maandrooster', compact('planning'));
    })->middleware(['auth', 'verified'])->name('maandrooster');
});

Route::middleware(['auth', 'role:manager'])->group(function () {
    Route::get('/planning/requests', [PlanningController::class, 'index']);
    Route::post('/planning/approve/{id}', [PlanningController::class, 'approve']);
    Route::post('/planning/reject/{id}', [PlanningController::class, 'reject']);
});
