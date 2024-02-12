<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\LikeChirpController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', fn () => Auth::check() ? to_route('chirps.index') : to_route('login'));

Route::middleware(['auth'])->as('chirps.')->group(function () {
    Route::get('/home', [ChirpController::class, 'index'])->name('index');
    Route::get('{user:username}/status/{chirp}', [ChirpController::class, 'show'])->name('show');
    Route::post('/chirps', [ChirpController::class, 'store'])->name('store');
    Route::delete('/chirps', [ChirpController::class, 'destroy'])->name('destroy');

    Route::patch('{chirp}/like', LikeChirpController::class)->name('like');
});

require __DIR__.'/auth.php';
