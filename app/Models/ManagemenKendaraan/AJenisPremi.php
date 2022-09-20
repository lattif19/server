<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AJenisPremi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_jenis_premi';


    
}
