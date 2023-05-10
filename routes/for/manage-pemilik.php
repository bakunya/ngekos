<?php

use App\Http\Controllers\Pemilik\PemilikFormAction;
use App\Http\Controllers\Pemilik\PemilikFormView;
use App\Http\Controllers\Pemilik\PemilikView;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin/pemilik')->middleware(['auth', 'verificated-email'])->group(function ()
{
    Route::get('/', [PemilikView::class, 'index'])->name("GET.admin.pemilik.index");
    Route::get('/create', [PemilikFormView::class, 'create'])->name('GET.admin.pemilik.create');
    Route::get('/update/{id}', [PemilikFormView::class, 'update'])->name("GET.admin.pemilik.update.id");

    Route::get('/delete/{id}', [PemilikFormAction::class, 'delete'])->name("GET.admin.pemilik.delete.id");
    Route::post('/update/{id}', [PemilikFormAction::class, 'update'])->name("POST.admin.pemilik.update.id");
    Route::post('/create', [PemilikFormAction::class, 'create'])->name('POST.admin.pemilik.create');
});