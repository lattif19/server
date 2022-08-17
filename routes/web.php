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


/*
| Level User adalah :
|  1. Administrator
|  2. Administrator HRD
|  3. Approver
|  4. User
| 
| Modul yang tersedia adalah : 
|  1. Pegawai
|  2. Absensi
|  3. Lembur
|  4. Asset
*/




Route::get('/', function () { return view('welcome'); })->middleware("guest")->name("login");
Route::post('/login', [LoginController::class, 'autenticate']);
Route::get('/logout', [LoginController::class, 'logout']);






Route::group(['middleware' => ["auth"]], function(){
    Route::get('/main', [DashboardController::class, 'index'])->name('home')->middleware("auth");
    Route::get('/asset', [AssetController::class, 'index']);
    Route::get('/sppd', [SppdController::class, 'index']);




    Route::get('/lembur', [LemburController::class, 'index']);
    Route::get('/lembur/{detail}/{lembur_pengajuan_id}', [LemburController::class, 'lembur_detail']);
    Route::post('/lembur/pengajuan_harian', [LemburController::class, 'lembur_pengajuan_harian']);
    Route::put('/lembur/rubah_pengjuan_lembur', [LemburController::class, 'rubah_pengajuan_lembur']);
    Route::post('/lembur/hapus_pengjuan_lembur', [LemburController::class, 'hapus_pengajuan_lembur']);
    Route::get('/lembur_settings', [LemburController::class, 'lembur_pengaturan']);
    Route::put('/lembur_settings', [LemburController::class, 'lembur_pengaturan_put']);
    Route::put('/lembur/pengaturan_jam', [LemburController::class, 'lembur_pengaturan_jam']);
    Route::get('/lembur/calculating/{periode}/{lembur_pengajuan_id}', [LemburController::class, 'lembur_hitung_total']);
    Route::post('/lembur/calculated/', [LemburController::class, 'lembur_simpan_total']);
    Route::get('/lembur_approve', [LemburController::class, 'lembur_approve']);
    Route::get('/lembur_approve/detail/{id}', [LemburController::class, 'lembur_approve_detail']);
    Route::put('/lembur_aprove/aksi', [LemburController::class, 'lembur_approve_aksi']);
    Route::get('/lembur_approved', [LemburController::class, 'lembur_approved']);
    Route::get('/lembur/print/{pengajuan_lembur_id}/{periode}', [LemburController::class, 'print_pdf']);
    Route::get('/absen', [AbsensiController::class, 'statistik']);
    route::post('/absen', [AbsensiController::class, 'import_absensi']);
    Route::get('/absen_data', [AbsensiController::class, 'index']);
    Route::get('/absen_pengaturan2', [AbsensiController::class, 'pengaturan2']);
    Route::put('/absen_pengaturan', [AbsensiController::class, 'pengaturan_tambah_mapping']);



    Route::group(['middleware' => ["pegawai"]], function(){
        Route::get('/pegawai', [UserController::class, 'index']);
        Route::get('/pegawai/{nik}', [UserController::class, 'detail']);
        Route::get('/hak_akses', [UserController::class, 'hak_akses']);
        Route::post('/hak_akses_put', [UserController::class, 'hak_akses_put']);
        Route::post('/hak_akses_put2', [UserController::class, 'hak_akses_put2']);
        Route::get('/divisi', [UserController::class, 'divisi']);
        Route::get('/jabatan', [UserController::class, 'jabatan']);
        Route::post('/divisi', [UserController::class, 'divisi_store']);
        Route::put('/divisi', [UserController::class, 'divisi_put']);
        Route::post('/jabatan', [UserController::class, 'jabatan_store']);
        Route::put('/jabatan', [UserController::class, 'jabatan_put']);
        Route::post('/pegawai', [UserController::class, 'pegawai_store']);
        Route::put('/pegawai', [UserController::class, 'pegawai_put']);
        Route::put('/pegawai/reset', [UserController::class, 'reset_password']);
    });

});


    



