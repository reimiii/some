<?php


use Illuminate\Support\Facades\Route;

/* ------- Moderator -------- */

Route::middleware('guru')->group(function () {

    Route::post('guru/logout', [
        \App\Http\Controllers\GuruController::class,
        'destroy'
    ])->name('guru.logout');

    Route::get('guru/dashboard', [
        \App\Http\Controllers\GuruController::class,
        'dashboard'
    ])->name('guru.dashboard');

});

Route::middleware('guest')->group(function () {

    Route::get('guru/login', [
        \App\Http\Controllers\GuruController::class,
        'index'
    ])->name('guru.login');

    Route::post('guru/login', [
        \App\Http\Controllers\GuruController::class,
        'store'
    ])->name('guru.login.post');

});


/* ------- End Moderator -------- */