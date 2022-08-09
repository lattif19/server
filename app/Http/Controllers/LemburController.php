<?php

namespace App\Http\Controllers;

use App\Models\Lembur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LemburController extends Controller
{
    
    public function index()
    {
        // Cek -> Sudah dibuat Pengajuan Belum ?
        //      Belum -> Buat Pengajuan dengan Total Kosong, Tampilkan Data
        //      Sudah -> Tampilkan Data
        $is_created = Lembur::cek_pengajuan($this->generate_periode());
        if($is_created <= 0 ){
            $this->pengajuan_kosong();
        }

        return view('lembur.index', [
            "pengajuanLembur" => Lembur::get_data_pengajuan(),
            "title" => "Pengajuan Lembur",
        ]);
    }

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
    public function generate_periode(){
        $bulan = date("m");
        $tanggal = date("d");

        if($bulan == 12 and $tanggal >=15){ $periode = "Januari"; }
        if($bulan == 1 and $tanggal <=15){ $periode = "Januari"; }

        if($bulan == 1 and $tanggal >=15){ $periode = "Februari"; }
        if($bulan == 2 and $tanggal <=15){ $periode = "Februari"; }

        if($bulan == 2 and $tanggal >=15){ $periode = "Maret"; }
        if($bulan == 3 and $tanggal <=15){ $periode = "Maret"; }
        
        if($bulan == 3 and $tanggal >=15){ $periode = "April"; }
        if($bulan == 4 and $tanggal <=15){ $periode = "April"; }
        
        if($bulan == 4 and $tanggal >=15){ $periode = "Mei"; }
        if($bulan == 5 and $tanggal <=15){ $periode = "Mei"; }
        
        if($bulan == 5 and $tanggal >=15){ $periode = "Juni"; }
        if($bulan == 6 and $tanggal <=15){ $periode = "Juni"; }
        
        if($bulan == 6 and $tanggal >=15){ $periode = "Juli"; }
        if($bulan == 7 and $tanggal <=15){ $periode = "Juli"; }
        
        if($bulan == 7 and $tanggal >=15){ $periode = "Agustus"; }
        if($bulan == 8 and $tanggal <=15){ $periode = "Agustus"; }
        
        if($bulan == 8 and $tanggal >=15){ $periode = "September"; }
        if($bulan == 9 and $tanggal <=15){ $periode = "September"; }
        
        if($bulan == 9 and $tanggal >=15 ){ $periode = "Oktober"; }
        if($bulan == 10 and $tanggal <=15 ){ $periode = "Oktober"; }
        
        if($bulan == 10 and $tanggal >=15 ){ $periode = "November"; }
        if($bulan == 11 and $tanggal <=15 ){ $periode = "November"; }

        if($bulan == 11 and $tanggal >=15 ){ $periode = "Desember"; }
        if($bulan == 12 and $tanggal <=15){ $periode = "Desember"; }

       return $periode." ".date("Y") ;
   }

}
