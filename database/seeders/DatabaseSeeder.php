<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HakAkses;
use App\Models\Modul;
use App\Models\PegawaiLevelUser;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Divisi;
use App\Models\Lembur;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            LemburSeeder::class,
            ManagemenKendaraan::class,
        ]);    
    
    
    }
}
