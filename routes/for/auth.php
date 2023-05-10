<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\ForgotPassword;
use App\Http\Controllers\Auth\Logout;
use App\Http\Controllers\Auth\RequiredVerificatedEmail;
use App\Http\Controllers\Auth\ResetPassword;

Route::prefix('/login')->middleware(['logout-if-has-ref-query', 'guest'])->group(function ()
{
    Route::get('/', [Login::class, 'index'])
        ->name('GET.login');
    Route::post('/', [Login::class, 'login'])
        ->name('POST.login');
});

Route::prefix('/forgot-password')->middleware('guest')->group(function ()
{
    Route::get('/', [ForgotPassword::class, 'index'])
        ->name('GET.forgot-password');
    Route::post('/', [ForgotPassword::class, 'post_forgot_password'])
        ->name('POST.forgot-password');
});

Route::prefix('/reset-password')->middleware(['logout-if-has-ref-query', 'guest'])->group(function ()
{
    Route::get('/', [ResetPassword::class, 'index'])
        ->name('GET.reset-password');
    Route::post('/', [ResetPassword::class, 'post_reset_password'])
        ->name('POST.reset-password');
});

Route::prefix('/logout')->middleware('auth')->group(function ()
{
    Route::get('/', [Logout::class, 'index'])
        ->name('GET.Logout');
    Route::post('/', [Logout::class, 'index'])
        ->name('POST.Logout');
});

Route::prefix('/required-verificated-email')->middleware('auth')->group(function ()
{
    Route::get('/', [RequiredVerificatedEmail::class, 'index'])
        ->name('GET.required-verificated-email');
    Route::post('/', [RequiredVerificatedEmail::class, 'post_required_verificated_email'])
        ->name('POST.required-verificated-email');
});