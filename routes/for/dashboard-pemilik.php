<?php

use App\Http\Controllers\DashboardPemilik\DashboardView;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/dashboard')->middleware(['auth', 'verificated-email'])->group(function ()
{
    Route::get('/', [DashboardView::class, 'index'])->name('GET.pemilik.dashboard');
});