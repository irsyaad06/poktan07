<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/list-agen', [FrontendController::class, 'listAgen'])->name('list-agen');
Route::get('/hasil-panen', [FrontendController::class, 'hasilPanen'])->name('hasil-panen');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PetaniController;
use App\Http\Controllers\Admin\HasilPanenController;
use App\Http\Controllers\Admin\AgenController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('petani', PetaniController::class);
    Route::resource('hasil-panen', HasilPanenController::class);
    Route::resource('agen', AgenController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('users', UserController::class)->only(['index', 'update', 'destroy']);
});

use App\Http\Controllers\Petani\DashboardController as PetaniDashboardController;
use App\Http\Controllers\Petani\ProfileController as PetaniProfileController;
use App\Http\Controllers\Petani\HasilPanenController as PetaniHasilPanenController;

Route::prefix('petani')->middleware(['auth', 'is_petani'])->group(function () {
    Route::get('/dashboard', [PetaniDashboardController::class, 'index'])->name('petani.dashboard');
    Route::get('/profile', [PetaniProfileController::class, 'edit'])->name('petani.profile');
    Route::put('/profile', [PetaniProfileController::class, 'update'])->name('petani.profile.update');
    Route::resource('hasil-panen', PetaniHasilPanenController::class)->names('petani.hasil-panen');
});
