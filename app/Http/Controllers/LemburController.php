<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;



class LemburController extends Controller
{

    public function print_pdf(Request $request){
        $data["periode"] = $request->periode;
        $data["id"] = $request->pengajuan_lembur_id;

        $pdf = PDF::loadView('lembur.lembur_print', $data);
    
        // return $pdf->download('itsolutionstuff.pdf');
        $pdf->setPaper('A4');
        return $pdf->stream();
    }

    public function lembur_approved(){
        return view("lembur.lembur_approved",[
            "title" => "Pengajuan Lembur",
            "pengajuan_lembur" => Lembur::get_pengajuan_lembur_hrd(),
        ]);
    }

    public function lembur_approve_aksi(Request $request){
        $id['id'] = $request->pengajuan_lembur_id;
        $data['keterangan'] = $request->keterangan;
        $data['status'] = $request->status;

        
        DB::table("lembur_pengajuan")->where($id)->update($data);
        return back()->with("success", "Proses Pengajuan Lembur Berhasil");
    }

    public function lembur_approve_detail(Request $request){
        $id = $request->id;

        return view("lembur.lembur_approve_detail",[
            "title" => "Detail Pengajuan Lembur",
            "detail" => Lembur::get_lembur_id($id),
        ]);
    }


    public function lembur_approve(){
        $id = Auth::user()->id;

        return view("lembur.lembur_approve", [
            "title" => "Pengajuan Lembur",
            "pengajuan_lembur" => Lembur::get_pengajuan_lembur($id),
        ]);
    }

    public function lembur_simpan_total(Request $request){

        $user_id['user_id'] = Auth::user()->id;
        $periode['periode'] = $request->lembur_pengajuan_periode;
        
        $data["total_biasa"] = $request->total_biasa;
        $data["total_libur"] = $request->total_libur;
        $data["status"] = "Diajukan";

        DB::table("lembur_pengajuan")->where($user_id)->where($periode)->update($data);
        
        
        $lembur_id = DB::table("lembur_pengajuan")->where($user_id)->where($periode)->first()->id;        
        
            for($x=0; $x<=count($request->hari_libur)-1; $x++){
                DB::table("lembur_pengajuan_detail")->insert([
                    "lembur_pengajuan_id" => $lembur_id,
                    "hari_libur" => $request->hari_libur[$x],
                    "tanggal" => $request->tanggal[$x],
                    "keterangan" => $request->keterangan[$x],
                    "jam_masuk_kantor" => $request->jam_masuk_kantor[$x],
                    "jam_kerja_kantor" => $request->jam_kerja_kantor[$x],
                    "jam_masuk" => $request->jam_masuk[$x],
                    "jam_pulang" => $request->jam_pulang[$x],
                    "jam_pulang_standar" => $request->jam_pulang_standar[$x],
                    "jam_lembur" => $request->jam_lembur[$x],
                ]);
            }

        return redirect("/lembur")->with("success", "Proses Pengajuan Lembur Berhasil");

    }

    public function lembur_hitung_total(Request $request){
        $data["user_id"] = Auth::user()->id;
        $data["periode"] = ucfirst(str_replace("-", " ", $request->periode));
        $data["lembur_pengajuan_id"] = $request->lembur_pengajuan_id;
        $jam = DB::table("lembur_settings")->get();


        return view("lembur.lembur_kalkulasi", [
            "title" => $data["periode"],
            "pengaturan_jam" => $jam[0],
            "jam_lembur" => Lembur::perhitungan_total_jam($data),
            
        ]);
    }

    public function lembur_pengaturan_jam(Request $request){
        $data['jam_kerja'] = $request->jam_kerja;
        $data['jam_masuk'] = $request->jam_masuk;
        
        
        $id = DB::table("lembur_settings")->get("id")->count();
    
        if($id == 0){
            DB::table("lembur_settings")->insert($data);
            return back()->with("success", "Penambahan Data Berhasil");
        }
        DB::table("lembur_settings")->where("id", $id)->update($data);
        return back()->with("success", "Penambahan Data Berhasil");
    }

    public function lembur_pengaturan_put(Request $request){
        $id['user_id'] = $request->user_id; 
        $data['lembur_approve_id'] = $request->lembur_approve_id;

         if(DB::table("pegawai")->where($id)->update($data)){
            return back()->with("success", "Penambahan Data Berhasil");
        }
        return back()->with("error", "Penambahan Data Gagal");
    }

    public function lembur_pengaturan(){
        $data = DB::table("lembur_settings")->get();
        
        return view("lembur.lembur_pengaturan", [
            "user" => Pegawai::get(),
            "users" => Pegawai::get(),
            "jam_kerja" => $data[0],
            "title" => "Pengaturan Lembur"
        ]);
    }

    public function hapus_pengajuan_lembur(Request $request){
        $id['id'] = $request->lembur_catatan;

        if(DB::table("lembur_catatan")->delete($id)){
            return back()->with("success", "Penambahan Data Berhasil");
        }
        return back()->with("error", "Penambahan Data Gagal");
    }

    public function rubah_pengajuan_lembur(Request $request){
        $id['id'] = $request->lembur_catatan;
        $data['tanggal'] = $request->tanggal;
        $data['keterangan'] = $request->keterangan;
        $data['hari_libur'] = $request->hari_libur;
        
        if(DB::table("lembur_catatan")->where($id)->update($data)){
            return back()->with("success", "Penambahan Data Berhasil");
        }
        return back()->with("error", "Penambahan Data Gagal");
    }

    public function lembur_pengajuan_harian(Request $request){

        
        $data['user_id'] = Auth::user()->id;
        $data['tanggal'] = $request->tanggal;
        $data['keterangan'] = $request->keterangan;
        $data['hari_libur'] = $request->hari_libur;
        $data['lembur_pengajuan_id'] = $request->lembur_pengajuan_id;

            if(DB::table("lembur_catatan")->insert($data)){
                return back()->with("success", "Penambahan Data Berhasil");
            }
            return back()->with("error", "Penambahan Data Gagal");
    }


    public function lembur_detail(Request $request){
        $periode = ucfirst(str_replace("-", " ", $request->detail));
        $user_id = Auth::user()->id;
        
        $biasa = Lembur::get_catatan_biasa($periode, $user_id);
        $libur = Lembur::get_catatan_libur($periode, $user_id);
       

        return view("lembur.lembur_detail", [
            "title" => $periode,
            "lembur_pengajuan_id" => $request->lembur_pengajuan_id,
            "biasa" => $biasa,
            "libur" => $libur,
            "pengajuanLembur" => false,
        ]);
    }
    
    public function index()
    {

        $is_created = Lembur::cek_pengajuan($this->generate_periode());
        if($is_created <= 0 ){
            $this->pengajuan_kosong();
        }

        return view('lembur.index', [
            "pengajuanLembur" => Lembur::get_data_pengajuan(),
            "title" => "Pengajuan Lembur",
        ]);
    }




    ##
    ##
    ##

    public function pengajuan_kosong(){
        $data['user_id'] = Auth::user()->id;
        $data['periode'] = $this->generate_periode();
        $data['total_biasa'] = "00:00:00";
        $data['total_libur'] = "00:00:00";
        $data['status'] = "Belum Diajukan";

        return Lembur::buat_pengajuan_awal($data);
    }



    public function status_lembur(){
        return $data = [
            '1'=>"Belum Diajukan",
            '2'=>"Proses Pengajuan",
            '3'=>"Disetujui",
        ];
    }

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Lembur $lembur)
    {
        //
    }

    
    public function edit(Lembur $lembur)
    {
        //
    }

    
    public function update(Request $request, Lembur $lembur)
    {
        
    }

    
    public function destroy(Lembur $lembur)
    {
        //
    }

    public function bulan_ini(){   return $bulan = date("m");}
    public function tanggal_ini(){ return $tanggal = date("d");}

    public function generate_periode(){
        $tanggal = date("d");
        $bulan = date("m");
        // $bulan = substr($date, "5","2");
        // $tanggal = substr($date, "8","2");

        if($bulan == 12 and $tanggal >=16){ $periode = "Januari"; }
        if($bulan == 1 and $tanggal <=16){ $periode = "Januari"; }

        if($bulan == 1 and $tanggal >=16){ $periode = "Februari"; }
        if($bulan == 2 and $tanggal <=16){ $periode = "Februari"; }

        if($bulan == 2 and $tanggal >=16){ $periode = "Maret"; }
        if($bulan == 3 and $tanggal <=16){ $periode = "Maret"; }
        
        if($bulan == 3 and $tanggal >=16){ $periode = "April"; }
        if($bulan == 4 and $tanggal <=16){ $periode = "April"; }
        
        if($bulan == 4 and $tanggal >=16){ $periode = "Mei"; }
        if($bulan == 5 and $tanggal <=16){ $periode = "Mei"; }
        
        if($bulan == 5 and $tanggal >=16){ $periode = "Juni"; }
        if($bulan == 6 and $tanggal <=16){ $periode = "Juni"; }
        
        if($bulan == 6 and $tanggal >=16){ $periode = "Juli"; }
        if($bulan == 7 and $tanggal <=16){ $periode = "Juli"; }
        
        if($bulan == 7 and $tanggal >=16){ $periode = "Agustus"; }
        if($bulan == 8 and $tanggal <=16){ $periode = "Agustus"; }
        
        if($bulan == 8 and $tanggal >=16){ $periode = "September"; }
        if($bulan == 9 and $tanggal <=16){ $periode = "September"; }
        
        if($bulan == 9 and $tanggal >=16 ){ $periode = "Oktober"; }
        if($bulan == 10 and $tanggal <=16 ){ $periode = "Oktober"; }
        
        if($bulan == 10 and $tanggal >=16 ){ $periode = "November"; }
        if($bulan == 11 and $tanggal <=16 ){ $periode = "November"; }

        if($bulan == 11 and $tanggal >=16 ){ $periode = "Desember"; }
        if($bulan == 12 and $tanggal <=16){ $periode = "Desember"; }

        return $periode." ".date("Y") ;
   }

}
