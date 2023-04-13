<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\ForgotPassword;

Route::prefix('/login')->middleware('guest')->group(function ()
{
    Route::get('/', [Login::class, 'index'])
        ->name('GET.login');
    Route::post('/', [Login::class, 'index'])
        ->name('POST.login');
});

Route::prefix('/register')->middleware('guest')->group(function ()
{
    Route::get('/', [Register::class, 'index'])
        ->name('GET.register');
    Route::post('/', [Register::class, 'register'])
        ->name('POST.register');
});

Route::prefix('/forgot-password')->middleware('guest')->group(function ()
{
    Route::get('/', [ForgotPassword::class, 'index'])
        ->name('GET.forgot-password');
    Route::post('/', [ForgotPassword::class, 'index'])
        ->name('POST.forgot-password');
});