<?php

use Illuminate\Support\Facades\Route;

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

include_once base_path('routes/for/auth.php');

include_once base_path('routes/for/manage-penyewa.php');
include_once base_path('routes/for/manage-pemilik.php');

include_once base_path('routes/for/dashboard.php');
include_once base_path('routes/for/dashboard-pemilik.php');
include_once base_path('routes/for/dashboard-penyewa.php');