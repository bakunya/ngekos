<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Penyewa
Route::get('/penyewa', [PenyewaController::class, 'index']);
Route::get('/add-penyewa', [PenyewaController::class, 'create']);
Route::post('/add-penyewa', [PenyewaController::class, 'store']);
Route::get('/edit-penyewa/{id}', [PenyewaController::class, 'edit']);
Route::post('/update-penyewa/{id}', [PenyewaController::class, 'update']);
Route::get('/delete-penyewa/{id}', [PenyewaController::class, 'destroy']);
Route::get('/cari-penyewa', [PenyewaController::class, 'cari']);

// pemilik
Route::get('/pemilik', [PemilikController::class, 'index']);
Route::get('/add-pemilik', [PemilikController::class, 'create']);
Route::post('/add-pemilik', [PemilikController::class, 'store']);
Route::get('/edit-pemilik/{id}', [PemilikController::class, 'edit']);
Route::post('/update-pemilik/{id}', [PemilikController::class, 'update']);
Route::get('/delete-pemilik/{id}', [PemilikController::class, 'destroy']);
Route::get('/cari-pemilik', [PemilikController::class, 'cari']);

// kos
Route::get('/kos', [KosController::class, 'index']);
Route::get('/add-kos', [KosController::class, 'create']);
Route::post('/add-kos', [KosController::class, 'store']);
Route::get('/edit-kos/{id}', [KosController::class, 'edit']);
Route::post('/update-kos/{id}', [KosController::class, 'update']);
Route::get('/delete-kos/{id}', [KosController::class, 'destroy']);
Route::get('/cari-kos', [KosController::class, 'cari']);

// kamar
Route::get('/kamar/{id}', [KamarController::class, 'index']);
Route::get('/add-kamar/{id}', [KamarController::class, 'create']);
Route::post('/add-kamar/{id}', [KamarController::class, 'store']);
Route::get('/edit-kamar/{id}', [KamarController::class, 'edit']);
Route::post('/update-kamar/{id}', [KamarController::class, 'update']);
Route::get('/delete-kamar/{id}', [KamarController::class, 'destroy']);
Route::post('/cari-kamar/{kos}', [KamarController::class, 'cari']);

// kontrak
Route::get('/kontrak/{id}', [KontrakController::class, 'index']);
Route::get('/add-kontrak/{id?}', [KontrakController::class, 'create']);
Route::post('/add-kontrak/{id}', [KontrakController::class, 'store']);
Route::get('/edit-kontrak/{id}', [KontrakController::class, 'edit']);
Route::post('/update-kontrak/{id}', [KontrakController::class, 'update']);
Route::get('/delete-kontrak/{id}', [KontrakController::class, 'destroy']);
Route::get('/cari-kontrak/{id}/cari', [KontrakController::class, 'cari']);
Route::get('/pilih-kos', [KontrakController::class, 'lihat']);
Route::get('/status/{id}', [KontrakController::class, 'status']);
Route::post('/konfirmasi/{id}', [KontrakController::class, 'konfirmasi']);
Route::get('/print/{id}', [KontrakController::class, 'print']);
Route::get('/tagih/{id}', [KontrakController::class, 'tagih']);
Route::post('/tagih/{id}', [KontrakController::class, 'wa']);
Route::get('/download-pdf/{id}', [KontrakController::class, 'download_pdf']);

// laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::post('/filter_bulan', [LaporanController::class, 'filter_bulan']);
Route::get('/laporan_pdf', [LaporanController::class, 'laporan_pdf']);
Route::get('/cari-transaksi', [LaporanController::class, 'cari']);

// dashboard    
Route::get('/dashboard', [DashboardController::class, 'index']);

// auth
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
