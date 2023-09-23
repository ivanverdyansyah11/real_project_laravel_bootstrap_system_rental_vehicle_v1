<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandKendaraanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisKendaraanController;
use App\Http\Controllers\KategoriKilometerKendaraanController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PajakController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PenambahanSewaController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SeriKendaraanController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\SopirController;
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
        Route::post('/login', 'login')->name('login.action');
    });
});

Route::middleware(['auth', 'owner'])->group(function () {
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
        Route::get('/jenis-kendaraan/detail/{id}', 'detail')->name('jenisKendaraan.detail');
        Route::post('/jenis-kendaraan/tambah', 'store')->name('jenisKendaraan.store');
        Route::post('/jenis-kendaraan/edit/{id}', 'update')->name('jenisKendaraan.update');
        Route::post('/jenis-kendaraan/hapus/{id}', 'delete')->name('jenisKendaraan.delete');
    });

    // BRAND KENDARAAN
    Route::controller(BrandKendaraanController::class)->group(function () {
        Route::get('/brand-kendaraan', 'index')->name('brandKendaraan');
        Route::get('/brand-kendaraan/detail/{id}', 'detail')->name('brandKendaraan.detail');
        Route::post('/brand-kendaraan/tambah', 'store')->name('brandKendaraan.store');
        Route::post('/brand-kendaraan/edit/{id}', 'update')->name('brandKendaraan.update');
        Route::post('/brand-kendaraan/hapus/{id}', 'delete')->name('brandKendaraan.delete');
    });

    // SERI KENDARAAN
    Route::controller(SeriKendaraanController::class)->group(function () {
        Route::get('/seri-kendaraan', 'index')->name('seriKendaraan');
        Route::get('/seri-kendaraan/detail/{id}', 'detail')->name('seriKendaraan.detail');
        Route::post('/seri-kendaraan/tambah', 'store')->name('seriKendaraan.store');
        Route::post('/seri-kendaraan/edit/{id}', 'update')->name('seriKendaraan.update');
        Route::post('/seri-kendaraan/hapus/{id}', 'delete')->name('seriKendaraan.delete');
    });

    // KATEGORI KILOMETER KENDARAAN
    Route::controller(KategoriKilometerKendaraanController::class)->group(function () {
        Route::get('/kilometer-kendaraan', 'index')->name('kilometerKendaraan');
        Route::get('/kilometer-kendaraan/detail/{id}', 'detail')->name('kilometerKendaraan.detail');
        Route::post('/kilometer-kendaraan/tambah', 'store')->name('kilometerKendaraan.store');
        Route::post('/kilometer-kendaraan/edit/{id}', 'update')->name('kilometerKendaraan.update');
        Route::post('/kilometer-kendaraan/hapus/{id}', 'delete')->name('kilometerKendaraan.delete');
    });

    // PELANGGAN
    Route::controller(PelangganController::class)->group(function () {
        Route::get('/pelanggan', 'index')->name('pelanggan');
        Route::get('/pelanggan/detail/{id}', 'detail')->name('pelanggan.detail');

        Route::get('/pelanggan/tambah', 'create')->name('pelanggan.create');
        Route::post('/pelanggan/tambah', 'store')->name('pelanggan.store');
        Route::get('/pelanggan/edit/{id}', 'edit')->name('pelanggan.edit');
        Route::post('/pelanggan/edit/{id}', 'update')->name('pelanggan.update');
        Route::post('/pelanggan/hapus/{id}', 'delete')->name('pelanggan.delete');
    });

    // SOPIR
    Route::controller(SopirController::class)->group(function () {
        Route::get('/sopir', 'index')->name('sopir');
        Route::get('/sopir/detail/{id}', 'detail')->name('sopir.detail');

        Route::get('/sopir/tambah', 'create')->name('sopir.create');
        Route::post('/sopir/tambah', 'store')->name('sopir.store');
        Route::get('/sopir/edit/{id}', 'edit')->name('sopir.edit');
        Route::post('/sopir/edit/{id}', 'update')->name('sopir.update');
        Route::post('/sopir/hapus/{id}', 'delete')->name('sopir.delete');
    });

    // SERVIS
    Route::controller(ServisController::class)->group(function () {
        Route::get('/servis', 'index')->name('servis');
        Route::get('/servis/check', 'check')->name('servis.check');
        Route::get('/kategori-servis', 'category')->name('kategoriServis');
    });

    // PAJAK
    Route::controller(PajakController::class)->group(function () {
        Route::get('/pajak', 'index')->name('pajak');
        Route::get('/pajak/detail', 'detail')->name('pajak.detail');
        Route::get('/pajak/transaksi', 'transaction')->name('pajak.transaction');
    });
});

Route::middleware('auth')->group(function () {
    // AUTH
    Route::controller(AuthController::class)->group(function () {
        Route::post('/logout', 'logout')->name('logout');
    });

    // DASHBOARD
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    // PENGGUNA
    Route::controller(PenggunaController::class)->group(function () {
        Route::get('/pengguna', 'index')->name('pengguna');
        Route::get('/pengguna/detail/{id}', 'detail')->name('pengguna.detail');
        Route::post('/pengguna/tambah', 'store')->name('pengguna.store');
        Route::post('/pengguna/edit/{id}', 'update')->name('pengguna.update');
        Route::post('/pengguna/hapus/{id}', 'delete')->name('pengguna.delete');
    });

    // PEMESANAN
    Route::controller(PemesananController::class)->group(function () {
        Route::get('/pemesanan', 'index')->name('pemesanan');
        Route::get('/pemesanan/booking', 'booking')->name('pemesanan.booking');
        Route::get('/pemesanan/pembayaran', 'transaction')->name('pemesanan.transaction');
        Route::post('/pemesanan/hapus', 'delete')->name('pemesanan.delete');
    });

    // PENGEMBALIAN
    Route::controller(PengembalianController::class)->group(function () {
        Route::get('/pengembalian', 'index')->name('pengembalian');
        Route::get('/pengembalian/kendaraan', 'restoration')->name('pengembalian.restoration');
    });

    // LAPORAN
    Route::controller(LaporanController::class)->group(function () {
        Route::get('/laporan', 'index')->name('laporan');
    });
});
