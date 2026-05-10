<?php

use Illuminate\Support\Facades\Route;
// Import controller
use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});
/**
 * Route resource
 */
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('departemen', DepartemenController::class);
Route::resource('jabatan', JabatanController::class);
Route::resource('karyawan', KaryawanController::class);
Route::resource('absensi', AbsensiController::class);
Route::resource('penggajian', PenggajianController::class);
/**
 * Route AJAX get gaji
 */
Route::get(
    '/get-gaji/{id}',
    [PenggajianController::class, 'getGaji']
);