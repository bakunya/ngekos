<?php

use App\Http\Controllers\DashboardPenyewa\DashboardView;
use Illuminate\Support\Facades\Route;

Route::prefix('/penyewa/dashboard')->middleware(['auth', 'verificated-email'])->group(function ()
{
    Route::get('/', [DashboardView::class, 'index'])->name('GET.penyewa.dashboard');
});