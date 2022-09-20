<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiLampiran extends Model
{
    use HasFactory;
    protected $table = 'pegawai_lampiran';
    protected $guarded = ['id'];
}
