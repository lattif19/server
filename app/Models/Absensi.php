<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Absensi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'lembur_absensi';


    public function get_mapped(){

        return DB::table("pegawai")
        ->distinct("pegawai.id")
        ->select(
                "pegawai.user_id", 
                "pegawai.nama as nama_pegawai",
                "pegawai.lembur_absen_id",
                "lembur_absensi.absen_id", 
                "lembur_absensi.nama as nama_absensi" )
        ->join("lembur_absensi", "pegawai.lembur_absen_id", "=", "lembur_absensi.absen_id")
        ->orderBy('nama_pegawai', 'asc')
        ->simplePaginate(10);
    }
}
 