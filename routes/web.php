<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandKendaraanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KategoriKilometerKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenambahanSewaController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SeriKendaraanController;
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
        Route::get('/kendaraan-disewa/nota-sewa', 'detail')->name('penambahanSewa.detail');

        Route::get('/kendaraan-disewa/tambah-sewa', 'edit')->name('penambahanSewa.edit');
        Route::post('/kendaraan-disewa/tambah-sewa', 'update')->name('penambahanSewa.update');
    });

    // KENDARAAN
    Route::controller(KendaraanController::class)->group(function () {
        Route::get('/kendaraan', 'index')->name('kendaraan');
        Route::get('/kendaraan/detail', 'detail')->name('kendaraan.detail');

        Route::get('/kendaraan/tambah', 'create')->name('kendaraan.create');
        Route::post('/kendaraan/tambah', 'store')->name('kendaraan.store');
        Route::get('/kendaraan/edit', 'edit')->name('kendaraan.edit');
        Route::post('/kendaraan/edit', 'update')->name('kendaraan.update');
        Route::post('/kendaraan/hapus', 'delete')->name('kendaraan.delete');
    });

    // JENIS KENDARAAN
    Route::controller(JenisKendaraanController::class)->group(function () {
        Route::get('/jenis-kendaraan', 'index')->name('jenisKendaraan');
        Route::post('/jenis-kendaraan/hapus', 'delete')->name('jenisKendaraan.delete');
    });

    // BRAND KENDARAAN
    Route::controller(BrandKendaraanController::class)->group(function () {
        Route::get('/brand-kendaraan', 'index')->name('brandKendaraan');
        Route::post('/brand-kendaraan/hapus', 'delete')->name('brandKendaraan.delete');
    });

    // SERI KENDARAAN
    Route::controller(SeriKendaraanController::class)->group(function () {
        Route::get('/seri-kendaraan', 'index')->name('seriKendaraan');
        Route::post('/seri-kendaraan/hapus', 'delete')->name('seriKendaraan.delete');
    });

    // KATEGORI KILOMETER KENDARAAN
    Route::controller(KategoriKilometerKendaraanController::class)->group(function () {
        Route::get('/kilometer-kendaraan', 'index')->name('kilometerKendaraan');
        Route::post('/kilometer-kendaraan/hapus', 'delete')->name('kilometerKendaraan.delete');
    });

    // PELANGGAN
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('pelanggan');
        Route::get('/pelanggan/detail', 'detail')->name('pelanggan.detail');

        Route::get('/pelanggan/tambah', 'create')->name('pelanggan.create');
        Route::post('/pelanggan/tambah', 'store')->name('pelanggan.store');
        Route::get('/pelanggan/edit', 'edit')->name('pelanggan.edit');
        Route::post('/pelanggan/edit', 'update')->name('pelanggan.update');
        Route::post('/pelanggan/hapus', 'delete')->name('pelanggan.delete');
    });
});
