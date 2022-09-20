<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APerbaikanDokumen extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_perbaikan_dokumen';

    public function a_service_perbaikan(){
        return $this->belongsTo(AServicePerbaikan::class);
    }
    public function aserviceperbaikan(){
        return $this->belongsTo(aserviceperbaikan::class);
    }
}