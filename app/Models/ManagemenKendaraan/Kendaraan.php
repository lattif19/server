<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_kendaraan';

    public function jeniskendaraan(){
        return $this->belongsTo(JenisKendaraan::class);
    }
}
