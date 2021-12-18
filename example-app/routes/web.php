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
    return redirect()->route('read_pengajuan');
});


Route::get('/login', [App\Http\Controllers\AuthController::class, 'loginMethod'])->name('login');
Route::get('/home', [App\Http\Controllers\AuthController::class, 'welcome'])->name('index');
Route::get('/halo',[App\Http\Controllers\AuthController::class, 'halo'])->name('halo') ;
Route::get('/coba', [App\Http\Controllers\AuthController::class, 'lisa'])->name('cb');

Route::group(['prefix' => 'lembaga'], function() {
    Route::get('/', [App\Http\Controllers\LembagaController::class, 'index'])->name('read_lembaga');
    Route::get('/tambah', [App\Http\Controllers\LembagaController::class, 'add_page'])->name('add_lembaga_page');
    Route::post('/tambah_data', [App\Http\Controllers\LembagaController::class, 'add_data'])->name('add_lembaga_data');
    Route::get('/hapus_data/{id_data}', [App\Http\Controllers\LembagaController::class, 'delete_data'])->name('delete_lembaga_data');
    Route::get('/edit_page/{id_data}', [App\Http\Controllers\LembagaController::class, 'edit_page'])->name('edit_lembaga_page');
    Route::post('/edit_data/{id_lembaga}', [App\Http\Controllers\LembagaController::class, 'edit_data'])->name('edit_lembaga_data');
});


Route::group(['prefix' => 'admin'], function() {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('read_admin');
    Route::get('/tambah', [App\Http\Controllers\AdminController::class, 'add_page'])->name('add_admin_page');
    Route::post('/tambah_data', [App\Http\Controllers\AdminController::class, 'add_data'])->name('add_admin_data');
    Route::get('/ubah_status_data/{id_data}', [App\Http\Controllers\AdminController::class, 'ubah_status_data'])->name('ubah_status_admin_data');
    Route::get('/edit_page/{id_data}', [App\Http\Controllers\AdminController::class, 'edit_page'])->name('edit_admin_page');
    Route::post('/edit_data/{id_admin}', [App\Http\Controllers\AdminController::class, 'edit_data'])->name('edit_admin_data');
});

Route::group(['prefix' => 'user'], function() {
    Route::get('/', [App\Http\Controllers\UserController::class, 'index'])->name('read_user');
    Route::get('/tambah', [App\Http\Controllers\UserController::class, 'add_page'])->name('add_user_page');
    Route::post('/tambah_data', [App\Http\Controllers\UserController::class, 'add_data'])->name('add_user_data');
    Route::get('/hapus_data/{id_data}', [App\Http\Controllers\UserController::class, 'delete_data'])->name('delete_user_data');
    Route::get('/edit_page/{id_data}', [App\Http\Controllers\UserController::class, 'edit_page'])->name('edit_user_page');
    Route::post('/edit_data/{id_user}', [App\Http\Controllers\UserController::class, 'edit_data'])->name('edit_user_data');
});

Route::group(['prefix' => 'pengajuan'], function() {
    Route::get('/', [App\Http\Controllers\PengajuanController::class, 'index'])->name('read_pengajuan');
    Route::get('/tambah', [App\Http\Controllers\PengajuanController::class, 'add_page'])->name('add_pengajuan_page');
    Route::post('/tambah_pengajuan', [App\Http\Controllers\PengajuanController::class, 'add_pengajuan_page'])->name('add_pengajuan_data_page');
    Route::post('/tambah_data', [App\Http\Controllers\PengajuanController::class, 'add_data'])->name('add_pengajuan_data');
    Route::get('/edit_status/{data}', [App\Http\Controllers\PengajuanController::class, 'edit_status'])->name('edit_status_pengajuan_data');
    Route::get('/hapus_data/{id_data}', [App\Http\Controllers\PengajuanController::class, 'delete_data'])->name('delete_pengajuan_data');
    Route::get('/edit_page/{id_data}', [App\Http\Controllers\PengajuanController::class, 'edit_page'])->name('edit_pengajuan_page');
    Route::get('/edit_pengajuan_page/{id_data}', [App\Http\Controllers\PengajuanController::class, 'edit_pengajuan_page'])->name('edit_pengajuan_data_page');
    Route::post('/edit_data/{id_pengajuan}', [App\Http\Controllers\PengajuanController::class, 'edit_data'])->name('edit_pengajuan_data');
});