<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\AppController::class, 'index']);
Route::get('/create', [\App\Http\Controllers\FileCreatorController::class, 'index']);


Route::get('/file/{id}', [\App\Http\Controllers\FileCreatorController::class, 'get_file']);
Route::post('file/{id}', [\App\Http\Controllers\FileCreatorController::class, 'get_secure']);

Route::post('/create', [\App\Http\Controllers\FileCreatorController::class, 'create']);
