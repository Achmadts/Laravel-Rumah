<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasesController;
use App\Http\Controllers\PetugassController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PembayaranController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/template', function () {
    return view('template.master');
});

Route::get('/grafik', function () {
    return view('grafik');
});

Route::middleware(['guest'])->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'login')->name('auth.login');
        Route::post('/authenticate', 'authenticate')->name('auth.authenticate');
    });
    Route::controller(RegisterController::class)->group(function () {
        Route::get('/register', 'create')->name('register.create');
        Route::post('/register', 'store')->name('register.store');
    });
});

Route::middleware(['web', 'auth', 'level:admin'])
    ->get('/dashboard/admin', function () {
        return view('admin');
    })->name('admin.dashboard');

Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout')->middleware('auth');

Route::middleware(['can:isPetugas'])->group(function () {
    Route::get('/dashboard/petugas', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
    Route::resource('/pembayaran', PembayaranController::class);
});

Route::middleware(['can:isAdmin'])->group(function () {
    Route::get('/dashboard/admin', [DashboardController::class, 'admin'])->name('dashboard.admin');
    Route::resource('/spp', SppController::class);
    Route::resource('/petugas', PetugassController::class);
    Route::resource('/kelas', KelasesController::class);
    Route::resource('/siswa', SiswaController::class);
});