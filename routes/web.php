<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KelasesController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PetugassController;

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

Route::resource('/spp', SppController::class);
Route::resource('/petugas', PetugassController::class);
Route::resource('/kelas', KelasesController::class);
Route::resource('/siswa', SiswaController::class);
Route::resource('/pembayaran', PembayaranController::class);
