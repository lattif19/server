<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AKendaraanDokumen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_kendaraan_dokumen';

    public function a_kendaraan(){
        return $this->belongsTo(AKendaraan::class);
    }
    public function akendaraan(){
        return $this->belongsTo(AKendaraan::class);
    }
}