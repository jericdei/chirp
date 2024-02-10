<?php

use App\Http\Controllers\ChirpController;
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

Route::get('/', [ChirpController::class, 'index']);
Route::get('{user:username}/status/{chirp}', [ChirpController::class, 'show']);
Route::post('/', [ChirpController::class, 'store']);
Route::delete('/', [ChirpController::class, 'destroy']);

require __DIR__.'/auth.php';
