<?php

namespace App\Models\ManagemenKendaraan;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AServicePerbaikan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_service_perbaikan';



    public function a_status_perbaikan(){
        return $this->belongsTo(AStatusPerbaikan::class);
    }

    public function a_jenis_service(){
        return $this->belongsTo(AJenisService::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function a_kendaraan(){
        return $this->belongsTo(AKendaraan::class);
    }
}
