<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenambahanSewaController;
use App\Http\Controllers\PenggunaController;
use App\Models\PenambahanSewa;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::fallback(function () {
    return redirect('/login');
});

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/login', 'index')->name('login');
    });
});

Route::middleware('guest')->group(function () {
    // DASHBOARD
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // PENGGUNA
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('/pengguna', 'index')->name('pengguna');
    });

    // KENDARAAN DISEWA
    Route::controller(PenambahanSewaController::class)->group(function () {
        Route::get('/kendaraan-disewa', 'index')->name('penambahanSewa');
        Route::get('/kendaraan-disewa/nota-sewa/{id}', 'detail')->name('penambahanSewa.detail');

        Route::get('/kendaraan-disewa/tambah-sewa/{id}', 'edit')->name('penambahanSewa.edit');
        Route::post('/kendaraan-disewa/tambah-sewa/{id}', 'update')->name('penambahanSewa.update');
    });
});
