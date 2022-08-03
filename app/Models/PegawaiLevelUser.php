<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiLevelUser extends Model
{
    use HasFactory;
    protected $table = 'pegawai_level_user';
    protected $guarded = ['id'];
}
