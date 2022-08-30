<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;
    protected $table = 'pegawai_hak_akses';
    protected $guarded = ['id'];
}
