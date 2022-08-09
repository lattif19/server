<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class Lembur extends Model
{
    use HasFactory;
    protected $table = 'lembur';
    protected $guarded = ['id'];

    public function get_catatan_libur($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "1")
            ->get();
    }


    public function get_catatan_biasa($periode, $id){
        return DB::table("lembur_catatan")
            ->join("lembur_pengajuan","lembur_catatan.lembur_pengajuan_id","=","lembur_pengajuan.id")
            ->select("lembur_catatan.id", "lembur_catatan.tanggal", "lembur_catatan.keterangan" )
            ->where("lembur_catatan.user_id", $id)
            ->where("lembur_pengajuan.periode", $periode)
            ->where("lembur_catatan.hari_libur", "0")
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
