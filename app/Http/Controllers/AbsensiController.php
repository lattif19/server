<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AbsensiImport;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class AbsensiController extends Controller
{

    public function absensi_pegawai(Request $request){
        $user_id = auth()->user()->id;
        $absen_id = Pegawai::where("user_id", $user_id)->get()[0]->lembur_absen_id;

        if($request->cari_awal == null || $request->cari_akhir == null){
            $awal = Absensi::where("absen_id", $absen_id)->orderBy("tanggal", "desc")->get()[0]->tanggal;
            $akhir = Absensi::where("absen_id", $absen_id)->orderBy("tanggal", "desc")->get()[29]->tanggal;
        }else{
            $awal = request()->cari_awal;
            $akhir = request()->cari_akhir;
        }

        return view("absen.absensi_pegawai", [
            "title" => "Absensi Pegawai",
            "absensi" => Absensi::where("absen_id", $absen_id)->
                                  whereBetween("tanggal", [$akhir, $awal])->orderBy("tanggal", "desc")->paginate(10),
        ]);
    }

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


    public function pengaturan2(Request $request){

        //dd(Absensi::distinct()->get(['absen_id','nama']));
        
        return view("absen.pengaturan2", [
            "title" => "Absensi dan Pegawai",
            "pegawai" => Pegawai::get_pegawai_cari($request->cari),
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
        $data = DB::table("lembur_absensi")->where("absen_id", $absensi_id)->orderBy("tanggal", "desc")->limit(7)->get(["jam_masuk", "jam_pulang", "tanggal"])->reverse();
        $jam_masuk = $this->jam_to_chart($data, "jam_masuk");
        $jam_pulang = $this->jam_to_chart($data, "jam_pulang");
        $tanggal = $this->tanggal_to_chart($data, "tanggal");
        
        return view("absen.statistik", [
            "title" => "Statistik Absensi",
            "jam_masuk" => $jam_masuk,
            "jam_pulang" => $jam_pulang,
            "tanggal" => $tanggal,
        ]);








    }

    public function tanggal_to_chart($data, $string){
        $y = "";
        for($x=0; $x<count($data); $x++){
            $y .= tanggl_id($data[$x]->$string).",";
        }
        return $y;
    }

    public function jam_to_chart($data, $string){
        $y = "";
        for($x=0; $x<count($data); $x++){
            $y .= substr($data[$x]->$string, "0","5").",";
        }
        return  str_replace(":",".",$y);
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
