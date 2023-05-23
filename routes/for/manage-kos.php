<?php

use App\Http\Controllers\Kos\KosFormAction;
use App\Http\Controllers\Kos\KosFormView;
use App\Http\Controllers\Kos\KosView;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/kos')->group(function ()
{
    Route::get('/', [KosView::class, 'index'])->name("GET.admin.kos.index");
    Route::get('/create', [KosFormView::class, 'create'])->name("GET.admin.kos.create");
    Route::post('/create', [KosFormAction::class, 'create'])->name("POST.admin.kos.create");
});