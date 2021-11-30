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
Route::get('/coba', [App\Http\Controllers\AuthController::class, 'lisa'])->name('cb');

Route::group(['prefix' => 'lembaga'], function() {
    Route::get('/', [App\Http\Controllers\LembagaController::class, 'index'])->name('read_lembaga');
    Route::get('/tambah', [App\Http\Controllers\LembagaController::class, 'add_page'])->name('add_lembaga_page');
    Route::post('/tambah_data', [App\Http\Controllers\LembagaController::class, 'add_data'])->name('add_lembaga_data');
    Route::post('/hapus_data', [App\Http\Controllers\LembagaController::class, 'delete_data'])->name('delete_lembaga_data');
});