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
}
