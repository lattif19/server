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

    public function user(){ }

    public function hak_akses(){
        return DB::table("pegawai_hak_akses")
                 ->join("pegawai","pegawai.id","=","pegawai_hak_akses.user_id")
                 ->join("modul","modul.id","=","pegawai_hak_akses.modul_id")
                 ->join("pegawai_level_user","pegawai_level_user.id","=","pegawai_hak_akses.pegawai_level_user_id")
                 ->select("pegawai_hak_akses.id", "pegawai.nama", "modul.nama as modul", "pegawai_level_user.nama as level")
                ->get();
    }

    public function get_jabatan(){
        return DB::table("pegawai_jabatan")->get();
    }

    public function get_divisi(){
        return DB::table("pegawai_divisi")->get();
    }

    public function get_pegawai(){
        return DB::table("pegawai")
                ->join("users", "users.id", "=", "pegawai.user_id")
                ->join("pegawai_divisi", "pegawai_divisi.id", "=", "pegawai.pegawai_divisi_id")
                ->join("pegawai_jabatan", "pegawai_jabatan.id", "=", "pegawai.pegawai_jabatan_id")
                ->select("pegawai.id", "pegawai.nik", "pegawai.nama", "users.email", "pegawai_jabatan.nama as jabatan", "pegawai_divisi.nama as divisi")
                ->get();
    }

}
