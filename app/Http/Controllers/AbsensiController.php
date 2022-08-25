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

    public function api_chart_data(){
        $absensi_id = DB::table("pegawai")->where("user_id",auth()->user()->id)->get()[0]->lembur_absen_id;
        $data = DB::table("lembur_absensi")->where("absen_id", $absensi_id)->orderBy("tanggal", "desc")->limit(10)->get(["tanggal", "jam_masuk", "jam_pulang"]);
        dd($data);
    }


    public function pengaturan_tambah_mapping(Request $request){
        // dd($request);
        $data['user_id'] = $request->user_id;
        $rubah['lembur_absen_id'] = $request->absen_id;


        $validate = DB::table('pegawai')->where($data)->update($rubah);
        
        if($validate){
            return redirect("/absen_pengaturan2")->with("success", "Penambahan Data Berhasil");
        }
        return redirect("/absen_pengaturan2")->with("error", "Penambahan Data Gagal");
    }


    public function pengaturan2(){
        return view("absen.pengaturan2", [
            "title" => "Absensi dan Pegawai",
            "pegawai" => Pegawai::paginate(10),
            "absensi" => Absensi::distinct()->get(['absen_id','nama']),
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
        $absensi_id = DB::table("pegawai")->where("user_id",auth()->user()->id)->get()[0]->lembur_absen_id;
        $data = DB::table("lembur_absensi")->where("absen_id", $absensi_id)->orderBy("tanggal", "desc")->limit(10)->get(["tanggal", "jam_masuk", "jam_pulang"]);
        // dd( json_decode($data) );
        
        
        
        return view("absen.statistik", [
            "title" => "Statistik Absensi",
        ]);
    }

    public function jam_to_chart($data){
        
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
