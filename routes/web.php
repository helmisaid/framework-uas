<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Route;


Route::get('/login', [CustomAuthController::class, 'indexlogin'])->name('login');
Route::post('/login', [CustomAuthController::class, 'login']);

Route::post('/register', [CustomAuthController::class, 'register']);
Route::get('/verify', [CustomAuthController::class, 'verify'])->name('verify');

Route::post('/logout', [CustomAuthController::class, 'logout'])->name('logout');
Route::get('/', function () {
    return view('userpage.index');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('dashboard');

    Route::get('/dashboard/master/satuan', [SatuanController::class, 'index'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan');
    Route::get('/dashboard/master/satuan/create', [SatuanController::class, 'create'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan.create');
Route::post('/dashboard/master/satuan', [SatuanController::class, 'store'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan.store');
Route::get('/dashboard/master/satuan/{satuan}/edit', [SatuanController::class, 'edit'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan.edit');
Route::put('/dashboard/master/satuan/{satuan}', [SatuanController::class, 'update'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan.update');
Route::delete('/dashboard/master/satuan/{satuan}', [SatuanController::class, 'destroy'])
    ->middleware(['auth', 'verified', 'admin'])
    ->name('satuan.destroy');
