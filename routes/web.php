<?php

use App\Http\Controllers\KelasModelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetugasModelController;
use App\Http\Controllers\SiswaModelController;
use App\Http\Controllers\SppModelController;

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

Route::controller(SppModelController::class)->group(function () {
    Route::get('/spp', 'index')->name('spp.index');
    Route::get('/spp/create', 'create')->name('spp.create');
    Route::post('/spp', 'store')->name('spp.store');
    Route::get('/spp/edit/{id_spp}', 'edit')->name('spp.edit');
    Route::put('/spp/{id_spp}', 'update')->name('spp.update');
    Route::get('/spp/detail/{id_spp}', 'show')->name('spp.show');
    Route::delete('/spp/{id}', 'destroy')->name('spp.destroy');
});

Route::controller(PetugasModelController::class)->group(function () {
    Route::get('/petugas', 'index')->name('petugas.index');
    Route::get('/petugas/create', 'create')->name('petugas.create');
    Route::post('/petugas', 'store')->name('petugas.store');
    Route::get('/petugas/edit/{id_petugas}', 'edit')->name('petugas.edit');
    Route::put('/petugas/{id_petugas}', 'update')->name('petugas.update');
    Route::get('/petugas/detail/{id_petugas}', 'show')->name('petugas.show');
    Route::delete('/petugas/{id}', 'destroy')->name('petugas.destroy');
});

Route::controller(KelasModelController::class)->group(function () {
    Route::get('/kelas', 'index')->name('kelas.index');
    Route::get('/kelas/create', 'create')->name('kelas.create');
    Route::post('/kelas', 'store')->name('kelas.store');
    Route::get('/kelas/edit/{id_kelas}', 'edit')->name('kelas.edit');
    Route::put('/kelas/{id_kelas}', 'update')->name('kelas.update');
    Route::get('/kelas/detail/{id_kelas}', 'show')->name('kelas.show');
    Route::delete('/kelas/{id}', 'destroy')->name('kelas.destroy');
});

Route::controller(SiswaModelController::class)->group(function () {
    Route::get('/siswa', 'index')->name('siswa.index');
    Route::get('/siswa/create', 'create')->name('siswa.create');
    Route::post('/siswa', 'store')->name('siswa.store');
    Route::get('/siswa/edit/{id_siswa}', 'edit')->name('siswa.edit');
    Route::put('/siswa/{id_siswa}', 'update')->name('siswa.update');
    Route::get('/siswa/detail/{id_siswa}', 'show')->name('siswa.show');
    Route::delete('/siswa/{id}', 'destroy')->name('siswa.destroy');
});