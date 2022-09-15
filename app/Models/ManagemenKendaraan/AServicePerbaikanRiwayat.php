<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AServicePerbaikanRiwayat extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_service_perbaikan_riwayat';

    public function a_service_perbaikan(){
        return $this->hasMany(AServicePerbaikan::class);
    }
}