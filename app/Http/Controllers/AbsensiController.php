<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsensiImport;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    public function pengaturan_tambah_mapping(Request $request){
        $data['user_id'] = $request->user_id;
        $rubah['lembur_absen_id'] = $request->absen_id;


        $validate = DB::table('pegawai')->where($data)->update($rubah);
        
        if($validate){
            return redirect("/absen_pengaturan")->with("success", "Penambahan Data Berhasil");
        }
        return redirect("/absen_pengaturan")->with("error", "Penambahan Data Gagal");
    }

    public function pengaturan(){
        return view("absen.pengaturan", [
            "pegawai" => Pegawai::all(),
            "absensi" => Absensi::distinct()->get(['absen_id','nama']),
            "pegawaiMapped"=> Absensi::get_mapped(),
            "title" => "Absensi dan Karyawan",
        ]);
    }




    public function import_absensi(Request $request){
        Excel::import(new AbsensiImport, $request->file("absensi"));
        return redirect("/absen_data")->with("success", "Import Data berhasil");
    }

    public function index()
    {
        
        return view('absen.index', [
            "absensi" => Absensi::simplePaginate(10)->withQueryString(),
            "title" => "Data Absensi",
        ]);
    }



    public function statistik(){
        return view("absen.statistik", [
            "title" => "Statistik Absensi",
        ]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

    public function show(Absensi $absensi)
    {
        //
    }

    public function edit(Absensi $absensi)
    {
        //
    }

    public function update(Request $request, Absensi $absensi)
    {
        //
    }


    public function destroy(Absensi $absensi)
    {
        //
    }
}
