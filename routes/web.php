<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\UserController;
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


Route::get('/pegawai/{nik}', [UserController::class, 'detail']);

Route::get('/pegawai', [UserController::class, 'index']);
Route::post('/pegawai', [UserController::class, 'pegawai_store']);
Route::put('/pegawai', [UserController::class, 'pegawai_put']);

Route::get('/divisi', [UserController::class, 'divisi']);
Route::post('/divisi', [UserController::class, 'divisi_store']);
Route::put('/divisi', [UserController::class, 'divisi_put']);

Route::get('/jabatan', [UserController::class, 'jabatan']);
Route::post('/jabatan', [UserController::class, 'jabatan_store']);
Route::put('/jabatan', [UserController::class, 'jabatan_put']);

Route::get('/hak_akses', [UserController::class, 'hak_akses']);







Route::get('/lembur', [LemburController::class, 'index']);
Route::get('/asset', [AssetController::class, 'index']);
Route::get('/sppd', [SppdController::class, 'index']);
Route::get('/absen', [AbsensiController::class, 'index']);
Route::get('/main', [DashboardController::class, 'index']);