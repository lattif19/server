<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_jenis_kendaraan';

    public function kendaraan(){
        return $this->hasMany(Kendaraan::class);
    }
}