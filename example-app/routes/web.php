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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginMethod'])->name('login');
Route::get('/home', [App\Http\Controllers\AuthController::class, 'index'])->name('index');
Route::get('/halo',[App\Http\Controllers\AuthController::class, 'halo'])->name('halo') ;
Route::get('/coba',[App\Http\Controllers\AuthController::class, 'lisa'])->name('cb');