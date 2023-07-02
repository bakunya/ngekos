<?php


use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\PenyewaController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KontrakController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Penyewa
Route::get('/penyewa', [PenyewaController::class, 'index'])->middleware('auth');
Route::get('/add-penyewa', [PenyewaController::class, 'create'])->middleware('auth');
Route::post('/add-penyewa', [PenyewaController::class, 'store'])->middleware('auth');
Route::get('/edit-penyewa/{id}', [PenyewaController::class, 'edit'])->middleware('auth');
Route::post('/update-penyewa/{id}', [PenyewaController::class, 'update'])->middleware('auth');
Route::get('/delete-penyewa/{id}', [PenyewaController::class, 'destroy'])->middleware('auth');
Route::get('/cari-penyewa', [PenyewaController::class, 'cari'])->middleware('auth');

// pemilik
Route::get('/pemilik', [PemilikController::class, 'index'])->middleware('auth');
Route::get('/add-pemilik', [PemilikController::class, 'create'])->middleware('auth');
Route::post('/add-pemilik', [PemilikController::class, 'store'])->middleware('auth');
Route::get('/edit-pemilik/{id}', [PemilikController::class, 'edit'])->middleware('auth');
Route::post('/update-pemilik/{id}', [PemilikController::class, 'update'])->middleware('auth');
Route::get('/delete-pemilik/{id}', [PemilikController::class, 'destroy'])->middleware('auth');
Route::get('/cari-pemilik', [PemilikController::class, 'cari'])->middleware('auth');

// kos
Route::get('/kos', [KosController::class, 'index'])->middleware('auth');
Route::get('/add-kos', [KosController::class, 'create'])->middleware('auth');
Route::post('/add-kos', [KosController::class, 'store'])->middleware('auth');
Route::get('/edit-kos/{id}', [KosController::class, 'edit'])->middleware('auth');
Route::post('/update-kos/{id}', [KosController::class, 'update'])->middleware('auth');
Route::get('/delete-kos/{id}', [KosController::class, 'destroy'])->middleware('auth');
Route::get('/cari-kos', [KosController::class, 'cari'])->middleware('auth');

// kamar
Route::get('/kamar/{id}', [KamarController::class, 'index'])->middleware('auth');
Route::get('/add-kamar/{id}', [KamarController::class, 'create'])->middleware('auth');
Route::post('/add-kamar/{id}', [KamarController::class, 'store'])->middleware('auth');
Route::get('/edit-kamar/{id}', [KamarController::class, 'edit'])->middleware('auth');
Route::post('/update-kamar/{id}', [KamarController::class, 'update'])->middleware('auth');
Route::get('/delete-kamar/{id}', [KamarController::class, 'destroy'])->middleware('auth');
Route::post('/cari-kamar/{kos}', [KamarController::class, 'cari'])->middleware('auth');

// kontrak
Route::get('/kontrak/{id}', [KontrakController::class, 'index'])->middleware('auth');
Route::get('/add-kontrak/{id?}', [KontrakController::class, 'create'])->middleware('auth');
Route::post('/add-kontrak/{id}', [KontrakController::class, 'store'])->middleware('auth');
Route::get('/edit-kontrak/{id}', [KontrakController::class, 'edit'])->middleware('auth');
Route::post('/update-kontrak/{id}', [KontrakController::class, 'update'])->middleware('auth');
Route::get('/delete-kontrak/{id}', [KontrakController::class, 'destroy'])->middleware('auth');
Route::get('/cari-kontrak/{id}/cari', [KontrakController::class, 'cari'])->middleware('auth');
Route::get('/pilih-kos', [KontrakController::class, 'lihat'])->middleware('auth');
Route::get('/status/{id}', [KontrakController::class, 'status'])->middleware('auth');
Route::post('/konfirmasi/{id}', [KontrakController::class, 'konfirmasi'])->middleware('auth');
Route::get('/print/{id}', [KontrakController::class, 'print'])->middleware('auth');
Route::get('/tagih/{id}', [KontrakController::class, 'tagih'])->middleware('auth');
Route::post('/tagih/{id}', [KontrakController::class, 'wa'])->middleware('auth');
Route::get('/download-pdf/{id}', [KontrakController::class, 'download_pdf'])->middleware('auth');

// laporan
Route::get('/laporan', [LaporanController::class, 'index'])->middleware('auth');
Route::post('/filter_bulan', [LaporanController::class, 'filter_bulan'])->middleware('auth');
Route::get('/laporan_pdf', [LaporanController::class, 'laporan_pdf'])->middleware('auth');
Route::get('/cari-transaksi', [LaporanController::class, 'cari'])->middleware('auth');

// dashboard    
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

// auth
Route::get('/register', [AuthController::class, 'index'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
