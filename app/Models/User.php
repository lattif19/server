<?php

namespace App\Models;

use App\Models\ManagemenKendaraan\AKendaraan;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public function a_kendaraan(){
        return $this->hasOne(AKendaraan::class);
    }

    public function pegawai(){ 
        return $this->hasOne(Pegawai::class);
    }

    protected $fillable = [
        'username', 'email', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
