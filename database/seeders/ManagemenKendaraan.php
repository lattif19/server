<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManagemenKendaraan\JenisKendaraan;
use App\Models\ManagemenKendaraan\Kendaraan;
use App\Models\ManagemenKendaraan\ServicePerbaikan;
use Illuminate\Support\Facades\DB;

class ManagemenKendaraan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JenisKendaraan::create(["nama"=>"Direksi",          "keterangan"=>"Asset Kendaran untuk Direksi" ]);
        JenisKendaraan::create(["nama"=>"Operasional",      "keterangan"=>"Asset Kendaran untuk Operasional Kantor" ]);
        JenisKendaraan::create(["nama"=>"Non-Aktif",        "keterangan"=>"Asset Kendaran yang telah non-aktif" ]);

        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DA',           'nama'=> 'Lexsus AL 300']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DB',           'nama'=> 'Lexsus BL 400']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DC',           'nama'=> 'Mazda AB 700 ']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DE',           'nama'=> 'Mazda AB 700']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DF',           'nama'=> 'Mazda AC 700']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'1',     'no_polisi'=>'B 8338 DG',           'nama'=> 'Avanza']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'2',     'no_polisi'=>'B 8338 OA',           'nama'=> 'Senia']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'2',     'no_polisi'=>'B 8338 OB',           'nama'=> 'Freed']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'2',     'no_polisi'=>'B 8338 OC',           'nama'=> 'Fenturer']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'2',     'no_polisi'=>'B 8338 OD',           'nama'=> 'Jimny']);
        Kendaraan::create(['a_jenis_kendaraan_id'=>'3',     'no_polisi'=>'B 8338 NA',           'nama'=> 'Karimun']);

        DB::table("a_status_perbaikan")->insert(["nama"=>"Pengajuan",           "keterangan" => "Pengajuan perbaikan oleh Driver"]);
        DB::table("a_status_perbaikan")->insert(["nama"=>"Booking",             "keterangan" => "Menjadwalkan Perbaikan"]);
        DB::table("a_status_perbaikan")->insert(["nama"=>"Proses Perbaikan",    "keterangan" => "Perbaikan Dalam Proses"]);
        DB::table("a_status_perbaikan")->insert(["nama"=>"Selesai",             "keterangan" => "Perbaikan Selesai"]);

        //ServicePerbaikan::create();
    }
}
