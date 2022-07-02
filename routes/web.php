<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* =========Moderator========== */

Route::middleware('moderator')->group(function () {
    Route::prefix('moderator')->group(function () {

        Route::get('dashboard', [
            \App\Http\Controllers\Mod\ModController::class,
            'dashboard'
        ])->name('moderator.dashboard');


        Route::get('setting/mod', [
            \App\Http\Controllers\Mod\ModController::class,
            'moderator'
        ])->name('setting.mod');

        /* ========= Moderator========== */

        // profile
        Route::get('setting/mod/profile/{moderator:email}', [
            \App\Http\Controllers\Mod\ModController::class,
            'profile'
        ])->name('setting.mod.profile');

        Route::put('setting/mod/profile/{moderator:email}', [
            \App\Http\Controllers\Mod\ModController::class,
            'profileUpdate'
        ])->name('setting.mod.profile.update');

        // end profile

        Route::get('setting/mod/new', [
            \App\Http\Controllers\Mod\ModController::class,
            'newMod'
        ])->name('setting.mod.new');

        Route::post('setting/mod/new', [
            \App\Http\Controllers\Mod\ModController::class,
            'createMod'
        ])->name('setting.mod.post');

        Route::get('setting/mod/{moderator:email}/edit', [
            \App\Http\Controllers\Mod\ModController::class,
            'editMod'
        ])->name('setting.mod.edit');

        Route::put('setting/mod/{moderator:email}', [
            \App\Http\Controllers\Mod\ModController::class,
            'updateMod'
        ])->name('setting.mod.update');

        Route::delete('setting/mod/{moderator:email}', [
            \App\Http\Controllers\Mod\ModController::class,
            'deleteMod'
        ])->name('setting.mod.delete');

        /* ========= End Moderator ========== */

    });
});

Route::redirect('moderator', '/moderator/login');
Route::redirect('guru', '/guru/login');

/* =========Moderator========== */


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware([
    'auth',
    'verified'
])->name('dashboard');

require __DIR__ . '/auth.php';
require __DIR__ . '/mod.php';
require __DIR__ . '/guru.php';

