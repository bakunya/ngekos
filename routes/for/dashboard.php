<?php

use App\Http\Controllers\Dashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('/dashboard')->middleware(['auth', 'verificated-email'])->group(function ()
{
    Route::get('/', [Dashboard::class, 'index'])->name('GET.dashboard');
});