<?php

use App\Http\Controllers\Penyewa\PenyewaFormAction;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Penyewa\PenyewaFormView;
use App\Http\Controllers\Penyewa\PenyewaView;

Route::prefix('/admin/penyewa')->middleware(['auth', 'verificated-email'])->group(function ()
{
    Route::get('/', [PenyewaView::class, 'index'])->name("GET.admin.penyewa.index");
    Route::get('/create', [PenyewaFormView::class, 'create'])->name('GET.admin.penyewa.create');
    Route::get('/update/{id}', [PenyewaFormView::class, 'update'])->name("GET.admin.penyewa.update.id");

    Route::get('/delete/{id}', [PenyewaFormAction::class, 'delete'])->name("GET.admin.penyewa.delete.id");
    Route::post('/update/{id}', [PenyewaFormAction::class, 'update'])->name("POST.admin.penyewa.update.id");
    Route::post('/create', [PenyewaFormAction::class, 'create'])->name('POST.admin.penyewa.create');
});