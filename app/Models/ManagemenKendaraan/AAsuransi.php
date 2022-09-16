<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AAsuransi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_asuransi';

    public function a_kendaraan(){
        return $this->belongsTo(AKendaraan::class);
    }

    public function a_jenis_asuransi(){
        return $this->belongsTo(AJenisAsuransi::class);
    }
    public function a_jenis_premi(){
        return $this->belongsTo(AJenisPremi::class);
    }

    public function a_asuransi_pic(){
        return $this->belongsTo(AAsuransiPic::class);
    }

    public function a_asuransi_dokumen(){
        return $this->hasMany(AAsuransiDokumen::class);
    }
}
