<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Models\Absensi;
use GuzzleHttp\Middleware;
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
})->middleware("guest");


Route::post('/login', [LoginController::class, 'autenticate']);
Route::get('/tampil_session', [LoginController::class, 'tampil_session']);
Route::get('/logout', [LoginController::class, 'logout']);



Route::post('/pegawai', [UserController::class, 'pegawai_store']);
Route::put('/pegawai', [UserController::class, 'pegawai_put']);
Route::put('/pegawai/reset', [UserController::class, 'reset_password']);

Route::post('/divisi', [UserController::class, 'divisi_store']);
Route::put('/divisi', [UserController::class, 'divisi_put']);

Route::post('/jabatan', [UserController::class, 'jabatan_store']);
Route::put('/jabatan', [UserController::class, 'jabatan_put']);





Route::group(['middleware' => ["auth"]], function(){
    Route::get('/lembur', [LemburController::class, 'index']);
    Route::get('/asset', [AssetController::class, 'index']);
    Route::get('/sppd', [SppdController::class, 'index']);
    Route::get('/main', [DashboardController::class, 'index'])->name('home');
    Route::get('/pegawai/{nik}', [UserController::class, 'detail']);
    Route::get('/hak_akses', [UserController::class, 'hak_akses']);
    Route::get('/pegawai', [UserController::class, 'index']);
    Route::get('/divisi', [UserController::class, 'divisi']);
    Route::get('/jabatan', [UserController::class, 'jabatan']);

    
    Route::get('/absen', [AbsensiController::class, 'statistik']);
    route::post('/absen', [AbsensiController::class, 'import_absensi']);
    Route::get('/absen_data', [AbsensiController::class, 'index']);
    Route::get('/absen_pengaturan', [AbsensiController::class, 'pengaturan']);
});