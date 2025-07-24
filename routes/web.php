<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('task/layouts/app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('role')->middleware('auth')->controller(RoleController::class)->group(function () {
    Route::get('/index', 'index')->name('role.index');
    Route::get('/getroles', 'getRoles')->name('role.getRoles');
    Route::get('/edit/{id}', 'edit')->name('role.edit');
    Route::post('/update/{id}', 'update')->name('role.update');
    Route::get('/delete/{id}', 'delete')->name('role.delete');
    Route::post('/store', 'store')->name('role.store');
});

require __DIR__ . '/auth.php';
