<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Matrix\Operators\Operator;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lembur';
    protected $guarded = ['id'];


    static function get_data_report($periode, $jenis, $filter){
        if($filter=="semua" || $filter==""){ 
            $status = "Belum Diajukan"; $operator = "!="; 
        }else{ 
            $status=$filter;  $operator = "like";}
        
        if($jenis=="general"){
            return DB::table("lembur_pengajuan")
                    ->join("pegawai","pegawai.user_id", "=", "lembur_pengajuan.user_id")
                    ->select(
                                "lembur_pengajuan.user_id as user_id",
                                "lembur_pengajuan.total_biasa",
                                "lembur_pengajuan.total_libur",
                                "lembur_pengajuan.status",
                                )
                    ->selectRaw("(select nama from pegawai where pegawai.user_id = lembur_pengajuan.user_id) as nama")
                    ->where("lembur_pengajuan.periode", "=", $periode)
                    ->where("lembur_pengajuan.status", $operator, $status )
                    ->get();
            
         }else{ 
            return DB::table("lembur_pengajuan")
                    ->join("lembur_pengajuan_detail", "lembur_pengajuan_detail.lembur_pengajuan_id","=","lembur_pengajuan.id")
                    ->join("pegawai","pegawai.user_id", "=", "lembur_pengajuan.user_id")
                    ->select(
                                "lembur_pengajuan.id",
                                "lembur_pengajuan.user_id as user_id",
                                "lembur_pengajuan.total_biasa",
                                "lembur_pengajuan.total_libur",
                                "lembur_pengajuan.status",
                                "lembur_pengajuan_detail.tanggal",
                                "lembur_pengajuan_detail.keterangan",
                                "lembur_pengajuan_detail.hari_libur",
                                "lembur_pengajuan_detail.jam_masuk",
                                "lembur_pengajuan_detail.jam_pulang",
                                "lembur_pengajuan_detail.jam_pulang_standar",
                                "lembur_pengajuan_detail.jam_lembur",
                                )
                    ->selectRaw("(select nama from pegawai where pegawai.user_id = lembur_pengajuan.user_id) as nama")
                    ->where("lembur_pengajuan.status", $operator, $status )
                    ->where("lembur_pengajuan.periode", "=", $periode)
                    ->orderBy("nama", "asc")
                    ->orderBy("hari_libur", "asc")
                    ->get();
         }
        
        
    }

    static function get_pengajuan_lembur_hrd($data){
        return DB::table("pegawai")
                    ->join("lembur_pengajuan", "lembur_pengajuan.user_id", "=" ,"pegawai.user_id")
                    ->select(   "pegawai.user_id", 
                                "pegawai.nama", 
                                "lembur_pengajuan.periode", 
                                "lembur_pengajuan.total_biasa", 
                                "lembur_pengajuan.total_libur",
                                "lembur_pengajuan.status",
                                "lembur_pengajuan.id")
                     ->where("lembur_pengajuan.status", "Disetujui")
                     ->orWhere("lembur_pengajuan.status", "Diajukan")
                     ->orWhere("lembur_pengajuan.status", "Selesai")
                     ->Where("pegawai.nama", "like", "%".$data."%")
                     ->orderBy("lembur_pengajuan.id", "desc")
                    ->paginate(10);
    }

    static function get_lembur_id($id){
        return DB::table("lembur_pengajuan")
                ->select(
                    "lembur_pengajuan.id as id",
                    "lembur_pengajuan.periode",
                    "lembur_pengajuan.status",
                    "lembur_pengajuan.total_biasa",
                    "lembur_pengajuan.total_libur",
                    "lembur_pengajuan_detail.tanggal",
                    "lembur_pengajuan_detail.hari_libur",
                    "lembur_pengajuan_detail.keterangan",
                    "lembur_pengajuan_detail.jam_masuk",
                    "lembur_pengajuan_detail.jam_pulang",
                    "lembur_pengajuan_detail.jam_masuk_kantor",
                    "lembur_pengajuan_detail.jam_kerja_kantor",
                    "lembur_pengajuan_detail.jam_pulang_standar",
                    "lembur_pengajuan_detail.jam_lembur",
                    )
                ->join("lembur_pengajuan_detail", "lembur_pengajuan.id", "=", "lembur_pengajuan_detail.lembur_pengajuan_id")
                ->where("lembur_pengajuan.id", $id)
                ->get();
    }


    static function get_pengajuan_lembur($id){
        return DB::table("pegawai")
                    ->join("lembur_pengajuan", "lembur_pengajuan.user_id", "=" ,"pegawai.user_id")
                    ->select(   "pegawai.user_id", 
                                "pegawai.nama", 
                                "lembur_pengajuan.periode", 
                                "lembur_pengajuan.total_biasa", 
                                "lembur_pengajuan.total_libur", 
                                "lembur_pengajuan.id")
                    ->where("pegawai.lembur_approve_id", $id)
                    ->where("lembur_pengajuan.status", "Diajukan")
                    ->get();
    }



    static function perhitungan_total_jam($data){
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



    static function get_catatan_libur($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan", "lembur_catatan.lembur_pengajuan_id" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "1")
            ->orderBy("lembur_catatan.tanggal", "asc")
            ->get();
    }


    static function get_catatan_biasa($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan", "lembur_catatan.lembur_pengajuan_id" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "0")
            ->orderBy("lembur_catatan.tanggal", "asc")
            ->get();
    }

    static function get_data_pengajuan($data){
        $id['user_id'] = Auth::user()->id;

        return DB::table("lembur_pengajuan")
        ->select("id", "periode", "total_biasa", "total_libur")
        ->selectRaw("(SELECT status_pengajuan from lembur_riwayat_pengajuan WHERE lembur_riwayat_pengajuan.lembur_pengajuan_id = lembur_pengajuan.id ORDER by id DESC LIMIT 1) as status")
        ->selectRaw("(SELECT komentar from lembur_riwayat_pengajuan WHERE lembur_riwayat_pengajuan.lembur_pengajuan_id = lembur_pengajuan.id ORDER by id DESC LIMIT 1) as keterangan")
        ->where($id)->where("periode", "like", "%".$data."%")->paginate(10);


        // return DB::table("lembur_pengajuan")
        //             ->where($id)
        //             ->where("periode", "like", "%".$data."%")
        //             ->orderBy('id', 'desc')
        //             ->paginate(10);
                    
    }

    static function buat_pengajuan_awal($data, $riwayat){

        $riwayat['lembur_pengajuan_id'] = DB::table("lembur_pengajuan")->insertGetId($data);
        return DB::table("lembur_riwayat_pengajuan")->insert($riwayat);
    }

    static function cek_pengajuan($periode){
        //nantinya mengembalikan data false atau true
        $data['periode'] = $periode;
        $id['user_id'] = Auth::user()->id;

        return DB::table("lembur_pengajuan")
        ->where($id)        
        ->where($data)        
        ->count();
    }

}
