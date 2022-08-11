<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lembur';
    protected $guarded = ['id'];


    public function perhitungan_total_jam($data){
        // SELECT 
            // lembur_catatan.tanggal, 
            // lembur_catatan.keterangan, 
            // lembur_absensi.jam_masuk, 
            // lembur_absensi.jam_pulang, 
            // lembur_absensi.id, 
            // pegawai.user_id, 
            // pegawai.lembur_absen_id 
        // FROM pegawai
        // JOIN lembur_pengajuan ON lembur_pengajuan.user_id = pegawai.user_id
        // JOIN lembur_catatan ON lembur_catatan.lembur_pengajuan_id = lembur_pengajuan.id
        // JOIN lembur_absensi ON lembur_absensi.tanggal = lembur_catatan.tanggal

        // WHERE 
        //     pegawai.user_id=3
        //     AND lembur_pengajuan.periode = "Agustus 2022"
        //     AND lembur_absensi.absen_id = 3

        $id_absen = Pegawai::where("user_id", $data['user_id'])->select("lembur_absen_id")->get();

        $hasil = DB::table("pegawai")
            ->join("lembur_pengajuan", "lembur_pengajuan.user_id","=","pegawai.user_id")    
            ->join("lembur_catatan", "lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")    
            ->join("lembur_absensi", "lembur_absensi.tanggal","=","lembur_catatan.tanggal")
            ->where("pegawai.user_id", $data['user_id'])    
            ->where("lembur_pengajuan.periode", $data['periode'])    
            ->where("lembur_absensi.absen_id", $id_absen[0]["lembur_absen_id"])
            ->select(
            "lembur_catatan.tanggal", 
            "lembur_catatan.keterangan", 
            "lembur_catatan.hari_libur", 
            "lembur_absensi.jam_masuk", 
            "lembur_absensi.jam_pulang", 
            "lembur_absensi.id", 
            "pegawai.user_id", 
            "pegawai.lembur_absen_id" )    
        ->get();

        return $hasil;

    }



    public function get_catatan_libur($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "1")
            ->orderBy("lembur_catatan.tanggal", "asc")
            ->get();
    }


    public function get_catatan_biasa($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "0")
            ->orderBy("lembur_catatan.tanggal", "asc")
            ->get();
    }

    public function get_data_pengajuan(){
        $id['user_id'] = Auth::user()->id;
        return DB::table("lembur_pengajuan")
                    ->where($id)
                    ->orderBy('id', 'desc')
                    ->paginate(10);
    }

    public function buat_pengajuan_awal($data){
        return DB::table("lembur_pengajuan")->insert($data);
    }

    public function cek_pengajuan($periode){
        //nantinya mengembalikan data false atau true
        $data['periode'] = $periode;
        $id['user_id'] = Auth::user()->id;

        return DB::table("lembur_pengajuan")
        ->where($id)        
        ->where($data)        
        ->count();
    }

}
