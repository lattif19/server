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

        public function hitung_ulang_hrd(Request $request){
            //dd($request->all());
           
            $pengajuan["total_biasa"] = $request->total_biasa;
            $pengajuan["total_libur"] = $request->total_libur;
            DB::table("lembur_pengajuan")->where("id", $request->pengajuan_id)->update($pengajuan);

            for($i=0; $i<count($request->id); $i++){
                $id['id'] = $request->id[$i];
                $data['jam_masuk_kantor'] = $request->jam_masuk_kantor[$i];
                $data['jam_kerja_kantor'] = $request->jam_kerja_kantor[$i];
                $data['jam_masuk'] = $request->jam_masuk[$i];
                $data['jam_pulang_standar'] = $request->jam_pulang_standar[$i];
                $data['jam_pulang'] = $request->jam_pulang[$i];
                $data['hari_libur'] = $request->hari_libur[$i];
                $data['jam_lembur'] = $request->jam_lembur[$i];
                DB::table("lembur_pengajuan_detail")->where($id)->update($data);
            }
            return back();
        }

        public function proses_terima_pengajuan(Request $request){
        //dd($request->lembur_pengajuan_id);
        //
        $id['id'] = $request->lembur_pengajuan_id;
        $lembur['status'] = "Selesai";

        $riwayat['created_at'] = date("Y-m-d H:i:s");
        $riwayat['lembur_pengajuan_id'] = $id['id'];
        $riwayat['status_pengajuan'] = "Selesai";
        $riwayat['komentar'] = "Pengajuan Diterima oleh Department HR&GA";

        if($lembur['status'] == "Selesai"){
            $this->generate_qrlink("Lembur-Selesai", $riwayat['lembur_pengajuan_id'], "aktif");
        }else{
            DB::table("validasi")->where("modul","=", "Lembur-Selesai")
                                 ->where("id_validasi", "=", $id['id'])
                                 ->update(["status"=>"tidak-aktif"]);
        }

        DB::table('lembur_pengajuan')->where($id)->update($lembur) ?
        DB::table('lembur_riwayat_pengajuan')->insert($riwayat) : back()->with("error", "Penambahan Data Gagal");

        return back()->with("success", "Proses pengajuan Lembur Telah selesai");
    }

    public function proses_tarik_pengajuan(Request $request){
        //dd($request->lembur_pengajuan_id);
        $id['id'] = $request->lembur_pengajuan_id;
        $lembur['status'] = "Belum Diajukan";

        $riwayat['created_at'] = date("Y-m-d H:i:s");
        $riwayat['lembur_pengajuan_id'] = $id['id'];
        $riwayat['status_pengajuan'] = "Belum Diajukan";
        $riwayat['komentar'] = "Pengajuan Ditarik";

        DB::table('lembur_pengajuan')->where($id)->update($lembur) ?
        DB::table('lembur_riwayat_pengajuan')->insert($riwayat) : back()->with("error", "Penambahan Data Gagal");

        return back()->with("success", "Proses penarikan data lembur berhasil");
    }

    public function reporting(Request $request){
        
        // $periode = DB::table("lembur_pengajuan")->distinct()->orderBy("id", "desc")->get('periode');
        
        $periode = DB::table("lembur_pengajuan")->distinct()->get('periode');
        $periode_hari_ini = $this->generate_periode();
        $data_lembur = Lembur::get_data_report($request->periode, $request->jenis_report, $request->filter);
        
        return view("lembur.lembur_report",[
            "title"                 => "Laporan Lembur",
            "periode"               => $periode,
            "periode_hari_ini"      => $periode_hari_ini,
            "data_lembur"           => $data_lembur,
        ]);
    }

    public function lembur_preview_total(Request $request){
        $id = $request->id;

        return view("lembur.lembur_preview_detail",[
            "title" => "Detail Pengajuan Lembur",
            "detail" => Lembur::get_lembur_id($id),
        ]);
    }

    public function print_pdf(Request $request){
        $user_id = DB::table("lembur_pengajuan")->where("id", $request->pengajuan_lembur_id)->get()[0]->user_id;
        $approver_id = DB::table("pegawai")->where("user_id", $user_id)->get()[0]->lembur_approve_id;

        $data["periode"] = $request->periode;
        $data['lembur'] = Lembur::get_lembur_id($request->pengajuan_lembur_id);


        //validasi
        $qr_diajukan = DB::table('validasi')->where('modul', "Lembur-Diajukan")->where("id_validasi", $request->pengajuan_lembur_id)->get();
        $qr_disetujui = DB::table('validasi')->where('modul', "Lembur-Disetujui")->where("id_validasi", $request->pengajuan_lembur_id)->get();
        $qr_selesai = DB::table('validasi')->where('modul', "Lembur-Selesai")->where("id_validasi", $request->pengajuan_lembur_id)->get();
        
        //generate link validasi
        if(count($qr_diajukan) > 0){
            $data['qr_diajukan'] = $qr_diajukan[0]->link_validasi."?kec=".$qr_diajukan[0]->link_validasi_cek;
        }else{
            $data['qr_diajukan'] = "";
        }


        if(count($qr_disetujui) > 0){
            $data['qr_disetujui'] = $qr_disetujui[0]->link_validasi."?kec=".$qr_disetujui[0]->link_validasi_cek;
        }else{
            $data['qr_disetujui'] = "";
        }

        if(count($qr_selesai) > 0){
            $data['qr_selesai'] = $qr_selesai[0]->link_validasi."?kec=".$qr_selesai[0]->link_validasi_cek;
        }else{
            $data['qr_selesai'] = "";
        }
        //tanggal_diterima //tanggal_approve




        if($approver_id != null){   
            $nama_approver = DB::table("pegawai")->where("user_id", $approver_id)->get()[0]->nama;
            $data["nama_approver"] = $nama_approver;
        }else{
            $data["nama_approver"] = "-- Belum Ditentukan --"; 
        }

        if(count($data['lembur']) == 0 ){
            return view("lembur.error.e_print");
        }

        return view("lembur.lembur_print", $data);

    }

    public function lembur_approved(Request $request){

        $data_pengajuan = Lembur::get_pengajuan_lembur_hrd($request->cari);


        return view("lembur.lembur_approved",[
            "title" => "Pengajuan Lembur",
            "pengajuan_lembur" => $data_pengajuan,
        ]);
    }

    public function lembur_approve_aksi(Request $request){
        $id['id'] = $request->pengajuan_lembur_id;
        $data['status'] = $request->status;

        $riwayat['lembur_pengajuan_id'] = $id['id'];
        $riwayat['status_pengajuan'] = $data['status'];
        $riwayat['created_at'] = date("Y-m-d H:i:s");
        if($data['status'] == "Disetujui"){
            $riwayat['komentar'] = $request->keterangan."<br> Pengajuan Telah Disetujui Oleh Atasan yang Bersangkutan";
        }else{
            $riwayat['komentar'] = $request->keterangan."<br> Pengajuan Anda Dikembalikan";
        }
        
        if($data['status'] == "Disetujui"){
            $this->generate_qrlink("Lembur-Disetujui", $riwayat['lembur_pengajuan_id'], "aktif");
        }else{
            DB::table("validasi")->where("modul","=", "Lembur-Diajukan")
                                 ->where("id_validasi", "=", $id['id'])
                                 ->update(["status"=>"tidak-aktif"]);
        }

        DB::table("lembur_pengajuan")->where($id)->update($data);
        DB::table("lembur_riwayat_pengajuan")->insertOrIgnore($riwayat);
        return back()->with("success", "Proses Pengajuan Lembur Berhasil");
    }

    public function lembur_approve_detail(Request $request){
        $id = $request->id;

        $user_id_pengaju = DB::table("lembur_pengajuan")->where("id", $id)->get()[0]->user_id;
        $user_id_pegawai = DB::table('pegawai')->where("user_id", $user_id_pengaju)->get()[0]->lembur_approve_id;
        
        $user_id_approver = auth()->user()->id;
        
        // dd($user_id_pegawai != $user_id_approver);

        if($user_id_pegawai != $user_id_approver){
            return abort(403);
        }




        return view("lembur.lembur_approve_detail",[
     // return view("lembur.lembur_preview_detail",[
            "title" => "Detail Pengajuan Lembur",
            "detail" => Lembur::get_lembur_id($id),
        ]);
    }

    public function lembur_approved_detail(Request $request){
        $id = $request->id;

        //return view("lembur.lembur_approve_detail",[
        return view("lembur.lembur_preview_detail",[
            "title" => "Detail Pengajuan Lembur",
            "detail" => Lembur::get_lembur_id($id),
        ]);
    }

    public function lembur_approved_detail_hrd(Request $request){
        $id = $request->id;

        //return view("lembur.lembur_approve_detail",[
        return view("lembur.lembur_preview_detail_hrd",[
            "title" => "Detail Pengajuan Lembur",
            "pengaturan" => DB::table("lembur_settings")->get(),
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
        //dd($request);
        $user_id['user_id']             = Auth::user()->id;
        $periode['periode']             = $request->lembur_pengajuan_periode;
        $data["total_biasa"]            = $request->total_biasa;
        $data["total_libur"]            = $request->total_libur;
        $data['status']                 = "Diajukan";

    

        DB::table("lembur_pengajuan")->where($user_id)->where($periode)->update($data);

        
        
        $lembur_id = DB::table("lembur_pengajuan")->where($user_id)->where($periode)->first()->id;

        $riwayat['lembur_pengajuan_id']     = $lembur_id;
        $riwayat['status_pengajuan']        = "Diajukan";
        $riwayat['created_at']              = date("Y-m-d H:i:s");

        DB::table("lembur_riwayat_pengajuan")->insertOrIgnore($riwayat);
            for($x=0; $x<=count($request->hari_libur)-1; $x++){
                    $data2["lembur_pengajuan_id"]     = $lembur_id;
                    $data2["hari_libur"]              = $request->hari_libur[$x];
                    $data2["tanggal"]                 = $request->tanggal[$x];
                    $data2["keterangan"]              = $request->keterangan[$x];
                    $data2["jam_masuk_kantor"]        = $request->jam_masuk_kantor[$x];
                    $data2["jam_kerja_kantor"]        = $request->jam_kerja_kantor[$x];
                    $data2["jam_masuk"]               = $request->jam_masuk[$x];
                    $data2["jam_pulang"]              = $request->jam_pulang[$x];
                    $data2["jam_pulang_standar"]      = $request->jam_pulang_standar[$x];
                    $data2["jam_lembur"]              = $request->jam_lembur[$x];

                 if(DB::table('lembur_pengajuan_detail')->where("lembur_pengajuan_id", $data2["lembur_pengajuan_id"])->where("tanggal",$data2["tanggal"])->count() == 1){
                    DB::table("lembur_pengajuan_detail")->where("lembur_pengajuan_id", $data2["lembur_pengajuan_id"])->where("tanggal",$data2["tanggal"])->update($data2);
                }else{
                    DB::table("lembur_pengajuan_detail")->insert($data2);
                }
            }
        
        $this->generate_qrlink("Lembur-Diajukan", $riwayat['lembur_pengajuan_id'], "aktif");
        return redirect("/lembur")->with("success", "Proses Pengajuan Lembur Berhasil");

    }

    public function lembur_hitung_total(Request $request){
        $data["user_id"] = Auth::user()->id;
        $data["periode"] = ucfirst(str_replace("-", " ", $request->periode));
        $data["lembur_pengajuan_id"] = $request->lembur_pengajuan_id;
        $jam = DB::table("lembur_settings")->get();

        $perhitungan = Lembur::perhitungan_total_jam($data);
        
        if(count($perhitungan) == 0){ return view("lembur.error.e_absensi_belum_ada"); }
        

        return view("lembur.lembur_kalkulasi", [
            "title" => $data["periode"],
            "pengaturan_jam" => $jam[0],
            "jam_lembur" => $perhitungan,
            
        ]);
    }

    public function lembur_pengaturan_jam(Request $request){
        $data['jam_kerja'] = $request->jam_kerja;
        $data['jam_masuk'] = $request->jam_masuk;
        $data["edit_jam_masuk"] = $request->edit_jam_masuk;
        $data["edit_jam_kerja"] = $request->edit_jam_kerja;
        $data["edit_jam_pulang"] = $request->edit_jam_pulang;
        
        
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

    public function lembur_pengaturan_user(){
        return view("lembur.lembur_pengaturan_user", [
            "title"     => "Menentukan Approver",
            "data_user" => Pegawai::get(),

        ]);
    }

    public function lembur_pengaturan_tambah_periode(Request $request){
        $data['user_id'] = $request->user_id;
        $data['periode'] = $request->periode;
        $data['total_biasa'] = "00:00:00";
        $data['total_libur'] = "00:00:00";
        $data['status'] = "Belum Diajukan";

        $riwayat['status_pengajuan'] = "Belum Diajukan";
        $riwayat['created_at'] = date("Y-m-d H:i:s");

        $validasi = DB::table("lembur_pengajuan")->where("user_id", $data['user_id'])->where("periode", $data['periode'])->count();

        if($validasi == 0){
            Lembur::buat_pengajuan_awal($data, $riwayat);
            return back()->with("success", "Penambahan Data Berhasil");
        }else{
            return back()->with("error", "Periode lembur sudah terbentuk");
        }
    }

    public function lembur_pengaturan(Request $request){
        
        if($request->nama){
            $pegawai = DB::table("pegawai")
                            ->where("nama", "like", "%".$request->nama."%")
                            ->paginate(10);
        }else{
            $pegawai = DB::table("pegawai")->paginate(10); 
        }

        $data = DB::table("lembur_settings")->get();
        return view("lembur.lembur_pengaturan", [
            "user" => $pegawai,
            "users" => Pegawai::get(),
            "jam_kerja" => $data[0],
            "title" => "Pengaturan Lembur"
        ]);
    }

    public function hapus_pengajuan_lembur(Request $request){
        $id['id']               = $request->lembur_catatan;
        $tanggal                = $request->tanggal;
        $lembur_pengajuan_id    = $request->lembur_pengajuan_id;


        // dd($id);
        #   harus di cek dulu apakah sudah ada kalkulasi atau belum
        #   jika ada hapus kalulasinya juga
        


        if( DB::table('lembur_pengajuan_detail')->where("lembur_pengajuan_id", $lembur_pengajuan_id)->where("tanggal", $tanggal)->count() == 1){
            DB::table('lembur_pengajuan_detail')->where("lembur_pengajuan_id", $lembur_pengajuan_id)->where("tanggal", $tanggal)->delete();
            DB::table("lembur_catatan")->delete($id);
        
        }else{
            DB::table("lembur_catatan")->delete($id);
        }

        // if(DB::table("lembur_catatan")->delete($id)){
        return back()->with("success", "Penambahan Data Berhasil");
        // }
        // return back()->with("error", "Penambahan Data Gagal");
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
        $data['created_at'] = date("Y-m-d H:i:s");
        
        
        $validated = DB::table("lembur_catatan")->where("tanggal", $data['tanggal'])->where("lembur_pengajuan_id", $data['lembur_pengajuan_id'])->count();
            
            if($validated == 0 && $data['tanggal'] <= today()){
                DB::table("lembur_catatan")->insert($data);     
                return back()->with("success", "Penambahan Data Berhasil");
             }
             return back()->with("error", "Sistem tidak mengizinkan menambah catatan dengan tanggal yang sama atau tanggal sebelum waktunya");
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
    
    public function index(Request $request)
    {
        
        $is_created = Lembur::cek_pengajuan($this->generate_periode());
        if($is_created <= 0 ){
            $this->pengajuan_kosong();
        }

        return view('lembur.index', [
            "pengajuanLembur" => Lembur::get_data_pengajuan($request->cari),
            "title" => "Pengajuan Lembur",
        ]);
    }


    public function pengajuan_kosong(){
        $data['user_id'] = Auth::user()->id;
        $data['periode'] = $this->generate_periode();
        $data['total_biasa'] = "00:00:00";
        $data['total_libur'] = "00:00:00";
        $data['status'] = "Belum Diajukan";

        $riwayat['status_pengajuan'] = "Belum Diajukan";
        $riwayat['created_at'] = date("Y-m-d H:i:s");

        return Lembur::buat_pengajuan_awal($data, $riwayat);
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

    public function cek_link_validasi(Request $request){
       $validasi =  DB::table('validasi')
                        ->where('link_validasi', $request->link)
                        ->where("link_validasi_cek", $request->kec)
                        ->where("status", "=", "aktif")
                        ->get();
        if(count($validasi) == 0){
            return view("validasi.lembur_validasi_error");
        }
        $lembur_id = $validasi[0]->id_validasi;
        $creatd_by = $validasi[0]->created_by;
        
        
        return view("validasi.lembur_validasi", [
            'status' => $validasi[0]->modul,
            'data_lembur' => DB::table("lembur_pengajuan")->where("id", $lembur_id)->get(),
            'data_creator' => DB::table("pegawai")->where("user_id", $creatd_by)->get(),
            'riwayat' => DB::table("lembur_riwayat_pengajuan")->where("lembur_pengajuan_id", $lembur_id)->get(),
        ]);
    }

    public function generate_qrlink($modul, $data_id, $status){
        
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                                    // Contoh Field
        $data['modul'] = $modul;                    // Lembur-Diajukan => untuk identifikasi valiasi {"Diajukan", "Disetujui", "Selesai"}
        $data['id_validasi'] = $data_id;           // Link Pengajuan Lembur
        $data['created_by'] = auth()->user()->id;   
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['link_validasi'] = substr(str_shuffle($permitted_chars), 0, 16);
        $data['link_validasi_cek'] = substr(str_shuffle($permitted_chars), 0, 8);
        $data["status"] = $status;
        

        //get data validasi dulu
        $validate = DB::table('validasi')->where('id_validasi', $data['id_validasi'])->where('modul', $data['modul'])->count();

        if($validate == 0){
            DB::table('validasi')->insert($data) ? back()->with("success", "Proses berhasil") :
            back()->with("error", "Penambahan validasi");
        }else{
            DB::table('validasi')->where('id_validasi', $data['id_validasi'])->where('modul', $data['modul'])->update($data) ? 
            back()->with("success", "Proses berhasil") :
            back()->with("error", "Penambahan validasi");
        }
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
