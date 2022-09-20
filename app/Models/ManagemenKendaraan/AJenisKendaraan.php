<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AJenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_jenis_kendaraan';

    public function a_kendaraan(){
        return $this->hasMany(AKendaraan::class);
    }
    public function akendaraan(){
        return $this->hasMany(AKendaraan::class);
    }
}