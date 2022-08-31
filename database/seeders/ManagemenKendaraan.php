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
        
        DB::table("a_jenis_service")->insert(["nama"=>"Perbaikan",              "keterangan" => "Perbaikan Mobil"]);
        DB::table("a_jenis_service")->insert(["nama"=>"Service Berkala",        "keterangan" => "Service Rutin"]);
        DB::table("a_jenis_service")->insert(["nama"=>"Service Tune Up",        "keterangan" => "Tune Up Mobil"]);
        DB::table("a_jenis_service")->insert(["nama"=>"Pergantian Sparepart",   "keterangan" => "Pergantian Sparepart"]);
        DB::table("a_jenis_service")->insert(["nama"=>"Lain-lain",              "keterangan" => "Service yang tidak masuk kategori"]);
        
        DB::table("a_jenis_asuransi")->insert(["nama"=>"Asuransi All-Risk",             "keterangan" => "Asuransi menanggung semua jenis resiko"]);
        DB::table("a_jenis_asuransi")->insert(["nama"=>"Total Loss Only (TLO)",         "keterangan" => "Asuransi dikhususkan untuk kehilangan total"]);
        DB::table("a_jenis_asuransi")->insert(["nama"=>"Collision Coverage",            "keterangan" => "Asuransi menanggung resiko akibat kecelakaan"]);
        DB::table("a_jenis_asuransi")->insert(["nama"=>"Liability Insurance",           "keterangan" => "Asuransi menanggung resiko akibat kecelakaan dan resiko medis pada pengendara"]);
        DB::table("a_jenis_asuransi")->insert(["nama"=>"Personal Injury Protection",    "keterangan" => "Asuransi yang memberikan perlindungan bagi pengemudi"]);
        
        DB::table("a_jenis_premi")->insert(["nama"=>"bulanan",    "keterangan" => "Pembayaran premi dilakukan setiap tahun"]);
        DB::table("a_jenis_premi")->insert(["nama"=>"tahunan",    "keterangan" => "Pembayaran premi dilakukan setiap bulan"]);
        
        DB::table("a_jenis_pajak")->insert(["nama"=>"tahunan",    "keterangan" => "Pajak Tahunan"]);
        DB::table("a_jenis_pajak")->insert(["nama"=>"lima tahun",    "keterangan" => "Pajak Lima Tahun"]);
        
        //ServicePerbaikan::create();
        //a_jenis_pajak
    }
}
