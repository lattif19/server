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


Route::get('/main', function(){ return view('dashboard/mainpage'); });
Route::get('/pegawai', function(){ return view('pegawai/index'); });
Route::get('/asset', function(){ return view('asset/index'); });
Route::get('/lembur', function(){ return view('lembur/index'); });
Route::get('/sppd', function(){ return view('sppd/index'); });
Route::get('/absen', function(){ return view('absen/index'); });