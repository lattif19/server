<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManagemenKendaraan\AJenisKendaraan;
use App\Models\ManagemenKendaraan\AKendaraan;
use App\Models\ManagemenKendaraan\AAsuransi;
use App\Models\ManagemenKendaraan\AServicePerbaikan;
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

        AJenisKendaraan::create(["nama"=>"Direksi",          "keterangan"=>"Asset Kendaran untuk Direksi" ]);
        AJenisKendaraan::create(["nama"=>"Operasional",      "keterangan"=>"Asset Kendaran untuk Operasional Kantor" ]);
        AJenisKendaraan::create(["nama"=>"Non-Aktif",        "keterangan"=>"Asset Kendaran yang telah non-aktif" ]);

        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DA',  'nama'=> 'Lexsus AL 300']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DB',  'nama'=> 'Lexsus BL 400']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DC',  'nama'=> 'Mazda AB 700 ']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DE',  'nama'=> 'Mazda AB 700']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DF',  'nama'=> 'Mazda AC 700']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'1',  'driver_id'=> "1",  'no_polisi'=>'B 8338 DG',  'nama'=> 'Avanza']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'2',  'driver_id'=> "1",  'no_polisi'=>'B 8338 OA',  'nama'=> 'Senia']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'2',  'driver_id'=> "1",  'no_polisi'=>'B 8338 OB',  'nama'=> 'Freed']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'2',  'driver_id'=> "1",  'no_polisi'=>'B 8338 OC',  'nama'=> 'Fenturer']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'2',  'driver_id'=> "1",  'no_polisi'=>'B 8338 OD',  'nama'=> 'Jimny']);
        AKendaraan::create(['a_jenis_kendaraan_id'=>'3',  'driver_id'=> "1",  'no_polisi'=>'B 8338 NA',  'nama'=> 'Karimun']);

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
        
        AServicePerbaikan::create([
            'driver_id' => '1',
            'a_kendaraan_id' => '1',
            'a_jenis_service_id' => '1',
            'a_status_perbaikan_id' => '1',
            'nama_bengkel' => 'Bengkel Barokah',
            'keterangan' => 'Service Rutin',
            'tanggal_booking' => date("Y-m-d"),
            'tanggal_masuk' => date("Y-m-d"),
            'tanggal_keluar' => date("Y-m-d"),
            'estimasi' => '1200000',
            'biaya' => '12000000',
        ]);

        AServicePerbaikan::create([
            'driver_id' => '1',
            'a_kendaraan_id' => '2',
            'a_jenis_service_id' => '2',
            'a_status_perbaikan_id' => '2',
            'nama_bengkel' => 'Barokah Sejahtera',
            'keterangan' => 'Cat Ulang',
            'tanggal_booking' => date("Y-m-d"),
            'tanggal_masuk' => date("Y-m-d"),
            'tanggal_keluar' => date("Y-m-d"),
            'estimasi' => '440000',
            'biaya' => '322000',
        ]);

        AServicePerbaikan::create([
            'driver_id' => '1',
            'a_kendaraan_id' => '3',
            'a_jenis_service_id' => '4',
            'a_status_perbaikan_id' => '3',
            'nama_bengkel' => 'Sumber Sejahtera',
            'keterangan' => 'Penggantian Aki Mobil',
            'tanggal_booking' => date("Y-m-d"),
            'tanggal_masuk' => date("Y-m-d"),
            'tanggal_keluar' => date("Y-m-d"),
            'estimasi' => '3430000',
            'biaya' => '34340000',
        ]);

        // AAsuransi::create([
        //     'a_kendaraan_id'
        // ]);
        
    }
}
