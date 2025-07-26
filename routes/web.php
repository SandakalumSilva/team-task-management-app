<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
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
    Route::get('/all-roles', 'allRoles')->name('role.allRoles');
    Route::get('/edit/{id}', 'edit')->name('role.edit');
    Route::post('/update/{id}', 'update')->name('role.update');
    Route::get('/delete/{id}', 'delete')->name('role.delete');
    Route::post('/store', 'store')->name('role.store');
});

Route::prefix('team')->middleware('auth')->controller(TeamController::class)->group(function () {
    Route::get('/index', 'index')->name('team.index');
    Route::get('/getteams', 'getTeams')->name('team.getTeams');
    Route::get('/all-teams', 'allTeams')->name('team.allTeams');
    Route::post('/store', 'store')->name('team.store');
    Route::get('/edit/{id}', 'edit')->name('team.edit');
    Route::post('/update/{id}', 'update')->name('team.update');
    Route::get('/delete/{id}', 'delete')->name('team.delete');
});

Route::prefix('user')->middleware('auth')->controller(UserController::class)->group(function () {
    Route::get('/index', 'index')->name('user.index');
    Route::post('/store', 'store')->name('user.store');
    Route::get('getusers', 'getUsers')->name('user.getUsers');
    Route::get('/edit/{id}', 'edit')->name('user.edit');
    Route::post('/update/{id}', 'update')->name('user.update');
    Route::get('/delete/{id}', 'delete')->name('user.delete');
});

Route::prefix('project')->middleware('auth')->controller(ProjectController::class)
->group(function () {
    Route::get('/index', 'index')->name('project.index');
});

require __DIR__ . '/auth.php';
