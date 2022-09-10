<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AStatusPerbaikan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_status_perbaikan';

    public function a_kendaraan(){
        return $this->belongsTo(AKendaraan::class);
    }
    
}
