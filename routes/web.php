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

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'welcome'])->name('welcome');
Route::get('getMunicipalities/{id}', [App\Http\Controllers\WelcomeController::class, 'getMunicipalities'])->name('getMunicipalities');
Route::post('createClient', [App\Http\Controllers\WelcomeController::class, 'createClient'])->name('createClient');
Route::get('getRandomClient', [App\Http\Controllers\WelcomeController::class, 'getRandomClient'])->name('getRandomClient');
Route::get('getClientList', [App\Http\Controllers\WelcomeController::class, 'getClientList'])->name('getClientList');
