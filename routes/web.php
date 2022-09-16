<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LemburController;
use App\Http\Controllers\SppdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Asset\KendaraanController;
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
Route::get("/validasi/{link}", [LemburController::class, "cek_link_validasi"]);






Route::group(['middleware' => ["auth"]], function(){








    Route::get('/main', [DashboardController::class, 'index'])->name('home')->middleware("auth");
    
    Route::get('/kendaraan', [KendaraanController::class, 'index']);
    Route::get('/kendaraan/mobil', [KendaraanController::class, 'daftar_kendaraan']);
    Route::get('/kendaraan/mobil/tambah', [KendaraanController::class, 'tambah_data_mobil']);
    Route::get('/kendaraan/service', [KendaraanController::class, 'service']);
    Route::get('/kendaraan/setting', [KendaraanController::class, 'setting']);
    Route::get('/kendaraan/asuransi', [KendaraanController::class, 'asuransi']);
    Route::get('/kendaraan/asuransi/tambah_data_asuransi', [KendaraanController::class, 'tambah_data_asuransi']);
    ///kendaraan/asuransi/tambah_data_asuransi

    Route::get('/kendaraan/service/s/{no_polisi}/tambah', [KendaraanController::class, 'tambah_pengajuan_langsung']);
    Route::get('/kendaraan/asuransi/detail/{asuransi_id}',[KendaraanController::class, 'asuransi_detail_data']);
    Route::get('/kendaraan/service/{id}/{aksi}', [KendaraanController::class, 'detail_service']);
    Route::get('/kendaraan/{no_polisi}/{aksi}', [KendaraanController::class, 'detail_kendaraan']);
    ////asuransi/tambah_data

    Route::post('/kendaraan/asuransi/tambah_data', [KendaraanController::class, 'asuransi_simpan_data']);
    Route::post('/kendaraan/service/aksi', [KendaraanController::class, 'service_edit_pengajuan']);
    Route::post('/kendaraan/service/tambah_pengajuan', [KendaraanController::class, 'service_tambah_pengajuan']);
    Route::post('/kendaraan/setting/premi_asuransi', [KendaraanController::class, 'setting_premi']);
    Route::post('/kendaraan/setting/jenis_asuransi', [KendaraanController::class, 'setting_jenis_asuransi']);
    Route::post('/kendaraan/setting/jenis_kendaraan', [KendaraanController::class, 'setting_jenis_kendaraan']);
    Route::post('/kendaraan/setting/jenis_service', [KendaraanController::class, 'setting_jenis_service']);
    Route::post('/kendaraan/setting/status_perbaikan', [KendaraanController::class, 'setting_status_perbaikan']);
    Route::post('/kendaraan/mobil/simpan_dokumen', [KendaraanController::class, 'simpan_dokumen']);
    Route::post('/kendaraan/mobil/update', [KendaraanController::class, 'simpan_detail_mobil']);
    //
    


    
    
    
    
    //Route::get('/sppd', [SppdController::class, 'index']);

    Route::get('/lembur', [LemburController::class, 'index']);
    Route::get('/lembur_report', [LemburController::class, 'reporting']);
    Route::get('/lembur/{detail}/{lembur_pengajuan_id}', [LemburController::class, 'lembur_detail']);
    Route::post('/lembur/pengajuan_harian', [LemburController::class, 'lembur_pengajuan_harian']);
    Route::put('/lembur/rubah_pengjuan_lembur', [LemburController::class, 'rubah_pengajuan_lembur']);
    Route::post('/lembur/hapus_pengjuan_lembur', [LemburController::class, 'hapus_pengajuan_lembur']);
    Route::get('/lembur_settings', [LemburController::class, 'lembur_pengaturan']);
    Route::post('/lembur_settings/add_user_periode', [LemburController::class, 'lembur_pengaturan_tambah_periode']);
    Route::get('/lembur_settings/approver', [LemburController::class, 'lembur_pengaturan_user']);
    Route::put('/lembur_settings', [LemburController::class, 'lembur_pengaturan_put']);
    Route::put('/lembur/pengaturan_jam', [LemburController::class, 'lembur_pengaturan_jam']);
    Route::get('/lembur/calculating/{periode}/{lembur_pengajuan_id}', [LemburController::class, 'lembur_hitung_total']);
    Route::get('/lembur/calculated/{id}/{periode}', [LemburController::class, 'lembur_preview_total']);
    Route::get('/lembur/calculated/', [LemburController::class, 'lembur_simpan_total']);
    Route::get('/lembur_approve', [LemburController::class, 'lembur_approve']);
    Route::get('/lembur_approve/detail/{id}', [LemburController::class, 'lembur_approve_detail']);
    Route::get('/lembur_approved/detail/{id}', [LemburController::class, 'lembur_approved_detail']);
    Route::put('/lembur_aprove/aksi', [LemburController::class, 'lembur_approve_aksi']);
    Route::get('/lembur_approved', [LemburController::class, 'lembur_approved']);
    Route::get('/lembur/print/{pengajuan_lembur_id}/{periode}', [LemburController::class, 'print_pdf']);
    Route::get('/lembur/print_pengajuan/{pengajuan_lembur_id}/{periode}', [LemburController::class, 'print_belum_diajukan']);
    Route::post('/lembur/tarik_pengajuan_lembur', [LemburController::class, 'proses_tarik_pengajuan']);
    Route::post('/lembur/terima_pengajuan_lembur', [LemburController::class, 'proses_terima_pengajuan']);
    




    Route::get('/absen', [AbsensiController::class, 'statistik']);
    route::post('/absen', [AbsensiController::class, 'import_absensi']);
    Route::get('/absen_data', [AbsensiController::class, 'index']);
    Route::get('/absen_pengaturan2', [AbsensiController::class, 'pengaturan2']);
    Route::put('/absen_pengaturan', [AbsensiController::class, 'pengaturan_tambah_mapping']);
    Route::get('/absen/api_chart_data', [AbsensiController::class, 'api_chart_data']);
    Route::get('/absen/data_absensi_pegawai', [AbsensiController::class, 'absensi_pegawai']);
    ///absen/data_absensi_pegawai



    //Route::group(['middleware' => ["pegawai"]], function(){
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
        Route::get('/profile/{id}', [UserController::class, 'profile_pegawai']);
    //});

});


    



