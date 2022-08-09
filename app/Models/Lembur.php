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
