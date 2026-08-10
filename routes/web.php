<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/list-agen', [FrontendController::class, 'listAgen'])->name('list-agen');
Route::get('/hasil-panen', [FrontendController::class, 'hasilPanen'])->name('hasil-panen');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PetaniController;
use App\Http\Controllers\Admin\HasilPanenController;
use App\Http\Controllers\Admin\AgenController;
use App\Http\Controllers\Admin\KegiatanController;

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('petani', PetaniController::class);
    Route::resource('hasil-panen', HasilPanenController::class);
    Route::resource('agen', AgenController::class);
    Route::resource('kegiatan', KegiatanController::class);
});
