<?php


use Illuminate\Support\Facades\Route;

/* ------- Moderator -------- */

Route::middleware('moderator')->group(function () {

    Route::post('moderator/logout', [
        \App\Http\Controllers\ModeratorController::class,
        'destroy'
    ])->name('moderator.logout');

});

Route::middleware('guest')->group(function () {

    Route::get('moderator/login', [
        \App\Http\Controllers\ModeratorController::class,
        'index'
    ])->name('moderator.login');

    Route::post('moderator/login', [
        \App\Http\Controllers\ModeratorController::class,
        'store'
    ])->name('moderator.login.post');

});


/* ------- End Moderator -------- */