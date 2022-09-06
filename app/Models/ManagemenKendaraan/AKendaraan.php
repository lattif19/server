<?php

namespace App\Models\ManagemenKendaraan;

use App\Models\Pegawai;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_kendaraan';

    //menggunakan nama tabel
    // public function pegawai(){
    //     return $this->belongsTo(Pegawai::class);
    // }

    public function a_asuransi(){
        return $this->hasMany(AAsuransi::class);
    }


    public function a_service_perbaikan(){
        return $this->hasMany(AServicePerbaikan::class);
    }
    public function a_jenis_kendaraan(){ 
        return $this->belongsTo(AJenisKendaraan::class);
    }




    //menggunakan nama model
    public function ajeniskendaraan(){
        return $this->belongsTo(AJenisKendaraan::class);
    }

    
}
