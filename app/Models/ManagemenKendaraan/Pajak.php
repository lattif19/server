<?php

namespace App\Models\ManagemenKendaraan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pajak extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'a_pajak';
}
