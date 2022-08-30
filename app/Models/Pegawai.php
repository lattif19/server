<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $guarded = ['id'];


    static function pegawai_validasi($data){
        $valid =  DB::table('pegawai')
                    ->where("pegawai.nik","=", $data['nik'])
                    ->count();

        if($valid >= 1){
            return false;
        }else{
            return $data;
        }
    }



    static function jabatan_validasi($data){
        $valid =  DB::table('pegawai_jabatan')
                    ->where("pegawai_jabatan.nama","=", $data['nama'])
                    ->count();

        if($valid >= 1){
            return false;
        }else{
            return $data;
        }
    }

    static function divisi_validasi($data){
        $valid =  DB::table('pegawai_divisi')
                    ->where("pegawai_divisi.nama","=", $data['nama'])
                    ->count();

        if($valid >= 1){
            return false;
        }else{
            return $data;
        }
    }

    static function get_modul(){
        return DB::table('modul')->get();
    }

    static function get_level(){
        return DB::table('pegawai_level_user')->get();
    }


    static function get_profile($id){
        return DB::table("pegawai")
                ->join("users", "users.id", "=", "pegawai.user_id")
                ->join("pegawai_divisi", "pegawai_divisi.id", "=", "pegawai.pegawai_divisi_id")
                ->join("pegawai_jabatan", "pegawai_jabatan.id", "=", "pegawai.pegawai_jabatan_id")
                ->select("pegawai.id", "pegawai.nik", "pegawai.user_id", "pegawai.nama", "users.email", "pegawai_jabatan.nama as jabatan", "pegawai_divisi.nama as divisi")
                ->where("pegawai.user_id","=", $id)
                ->get();
    }


    static function get_detail($nik){
        return DB::table("pegawai")
                ->join("users", "users.id", "=", "pegawai.user_id")
                ->join("pegawai_divisi", "pegawai_divisi.id", "=", "pegawai.pegawai_divisi_id")
                ->join("pegawai_jabatan", "pegawai_jabatan.id", "=", "pegawai.pegawai_jabatan_id")
                ->select("pegawai.id", "pegawai.nik", "pegawai.user_id", "pegawai.nama", "users.email", "pegawai_jabatan.nama as jabatan", "pegawai_divisi.nama as divisi")
                ->where("pegawai.nik","=", $nik)
                ->get();
    }

    
    static function hak_akses(){
        return DB::table("pegawai_hak_akses")
                 ->join("pegawai","pegawai.id","=","pegawai_hak_akses.user_id")
                 ->join("modul","modul.id","=","pegawai_hak_akses.modul_id")
                 ->join("pegawai_level_user","pegawai_level_user.id","=","pegawai_hak_akses.pegawai_level_user_id")
                 ->select("pegawai_hak_akses.id", "pegawai.nama", "modul.nama as modul", "pegawai_level_user.nama as level")
                 ->orderBy("pegawai.nama", "asc")
                ->paginate(10);
    }


    static function hak_akses_cari($data){
        return DB::table("pegawai_hak_akses")
                 ->join("pegawai","pegawai.id","=","pegawai_hak_akses.user_id")
                 ->join("modul","modul.id","=","pegawai_hak_akses.modul_id")
                 ->join("pegawai_level_user","pegawai_level_user.id","=","pegawai_hak_akses.pegawai_level_user_id")
                 ->select("pegawai_hak_akses.id", "pegawai.nama", "modul.nama as modul", "pegawai_level_user.nama as level")
                 ->where("pegawai.nama", "like" , "%".$data."%")
                 ->orderBy("pegawai.nama", "asc")
                ->paginate(10);
    }



    static function get_jabatan(){
        return DB::table("pegawai_jabatan")->get();
    }

    static function get_divisi(){
        return DB::table("pegawai_divisi")->get();
    }

    static function get_pegawai(){
        return DB::table("pegawai")
                ->join("users", "users.id", "=", "pegawai.user_id")
                ->join("pegawai_divisi", "pegawai_divisi.id", "=", "pegawai.pegawai_divisi_id")
                ->join("pegawai_jabatan", "pegawai_jabatan.id", "=", "pegawai.pegawai_jabatan_id")
                ->select("pegawai.id", "pegawai.nik","pegawai.user_id", "pegawai.nama", "users.email", "pegawai_jabatan.nama as jabatan", "pegawai_divisi.nama as divisi")
                ->paginate(10);
    }

}
