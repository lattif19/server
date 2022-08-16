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
        //  User::factory(1)->create();
         DB::table("lembur_settings")->insert(["jam_masuk"=>"08:00:00", "jam_kerja" => "09:00:00"]);

         User::create([ 'username' => "administrator",      'email' => "admin@gmail.com",                   'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "Administrator HRD",  'email' => "hrd@ssprimadaya.co.id",             'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "approver",           'email' => "approver@gmail.com",                'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "user",               'email' => "user@gmail.com",                    'password' => bcrypt("s2pjakarta"), ]);

         User::create([ 'username' => "nur_ardhiansyah",    'email' => "nur_a@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "krisdina_yulianto",  'email' => "krisdina_y@ssprimadaya.co.id",      'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "ahmad_tuanto",       'email' => "it.support@ssprimadaya.co.id",      'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "lattif_priatno",     'email' => "support@ssprimadaya.co.id",         'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "hari_wibowo",        'email' => "hari@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "arri_pradipta",      'email' => "a_pradipta@ssprimadaya.co.id",      'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "nadia_suwandy",      'email' => "nadia@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "sri_maryati",        'email' => "sri_m@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "syafriyanzah",       'email' => "syafriyanzah@ssprimadaya.co.id",    'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "irboni_utami",       'email' => "irboni@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "ana_malini",         'email' => "ana_m@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "suharman_rosuli",    'email' => "suharman@ssprimadaya.co.id",        'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "gina_novianti",      'email' => "gina@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "maria_friska",       'email' => "friska@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "damar_cahyono",      'email' => "damar_cahyono@ssprimadaya.co.id",   'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "heri_setiawan",      'email' => "pjk@ssprimadaya.co.id",             'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "edwin_basten",       'email' => "edwin@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "shella_tanoto",      'email' => "shella@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "siti_fatimah",       'email' => "sfatimah@ssprimadaya.co.id",        'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "engkus",             'email' => "engkus@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "audrey_cecilia",     'email' => "audrey@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "nabilah_syahputri",  'email' => "nabilah@ssprimadaya.co.id",         'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "rosarina",           'email' => "rosa@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "bramanto_seno",      'email' => "bram@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "gadis_anindiya",     'email' => "gadis@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);




         Pegawai::create(['nik' => '20220001J',   'nama' => 'Administrator',              'user_id' => '1',    'lembur_absen_id' => '1',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'1']);
         Pegawai::create(['nik' => '20220033J',   'nama' => 'Admin HRD',                  'user_id' => '2',    'lembur_absen_id' => '1',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220002J',   'nama' => 'Approver',                   'user_id' => '3',    'lembur_absen_id' => '2',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220003J',   'nama' => 'User',                       'user_id' => '4',    'lembur_absen_id' => '3',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220004J',   'nama' => 'Nur Ardhiansyah',            'user_id' => '5',        'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220005J',   'nama' => 'Krisdina Yulianto',          'user_id' => '6',        'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220006J',   'nama' => 'Ahmad Tuanto',               'user_id' => '7',        'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220007J',   'nama' => 'Lattif Priatno',             'user_id' => '8',        'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220008J',   'nama' => 'Hari Wibowo',                'user_id' => '9',        'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220009J',   'nama' => 'Arri Pradipta',              'user_id' => '10',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220010J',   'nama' => 'Nadia Suwandy',              'user_id' => '11',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220011J',   'nama' => 'Sri Maryati',                'user_id' => '12',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220012J',   'nama' => 'Syafriyanzah',               'user_id' => '13',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220013J',   'nama' => 'Irboni Utami',               'user_id' => '14',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220014J',   'nama' => 'Ana Malini',                 'user_id' => '15',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220015J',   'nama' => 'Suharman Rosuli',            'user_id' => '16',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220016J',   'nama' => 'Gina Novianti',              'user_id' => '17',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220017J',   'nama' => 'Maria Friska',               'user_id' => '18',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220018J',   'nama' => 'Damar Cahyono',              'user_id' => '19',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220019J',   'nama' => 'Heri Setiawan',              'user_id' => '20',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220020J',   'nama' => 'Edwin Basten',               'user_id' => '21',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220021J',   'nama' => 'Shella Tanoto',              'user_id' => '22',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220022J',   'nama' => 'Siti Fatimah',               'user_id' => '23',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220023J',   'nama' => 'Engkus',                     'user_id' => '24',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220024J',   'nama' => 'Audrey Cecilia',             'user_id' => '25',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220025J',   'nama' => 'Nabilah Syahputri',          'user_id' => '26',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220026J',   'nama' => 'Rosarina',                   'user_id' => '27',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220027J',   'nama' => 'Bramanto Seno',              'user_id' => '28',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220028J',   'nama' => 'Gadis Anindiya',             'user_id' => '29',       'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
  
         




         Divisi::create(['nama' => 'IT']);
         Divisi::create(['nama' => 'Keuangan']);
         Divisi::create(['nama' => 'Akuntansi']);
         Divisi::create(['nama' => 'Sekretariat']);
         Divisi::create(['nama' => 'Projek']);
         Divisi::create(['nama' => 'Pengadaan']);
         Divisi::create(['nama' => 'HR & GA']);

         Jabatan::create(['nama'=> "Direktur"]);
         Jabatan::create(['nama'=> "Manager"]);
         Jabatan::create(['nama'=> "Supervisor"]);
         Jabatan::create(['nama'=> "Senior Staff"]);
         Jabatan::create(['nama'=> "Staff"]);
         Jabatan::create(['nama'=> "Office Boy"]);
         
         PegawaiLevelUser::create(['nama' => 'Administrator']);
         PegawaiLevelUser::create(['nama' => 'Administrator HRD']);
         PegawaiLevelUser::create(['nama' => 'Approver']);
         PegawaiLevelUser::create(['nama' => 'User']);


         
         Modul::create(['nama' => "Sistem Pengolahan Pegawai"]);
         Modul::create(['nama' => "Sistem Pengolahan Absensi"]);
         Modul::create(['nama' => "Sistem Pengolahan Lembur"]);
         Modul::create(['nama' => "Sistem Pengolahan Asset"]);
         
         
         //modul Pegawai
         HakAkses::create([ 'user_id' =>'1' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '1']);
         HakAkses::create([ 'user_id' =>'2' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '2']);
         HakAkses::create([ 'user_id' =>'3' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'4' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'5' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'6' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'7' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'8' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'9' ,  'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'10' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'11' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'12' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'13' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'14' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'15' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'16' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'17' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'18' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'19' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'20' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'21' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'22' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'23' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'24' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'25' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'26' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'27' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'28' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'29' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);



        //Modul Lembur
         HakAkses::create([ 'user_id' =>'1' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '1']);
         HakAkses::create([ 'user_id' =>'2' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '2']);
         HakAkses::create([ 'user_id' =>'3' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'4' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'5' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'6' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'7' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'8' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'9' ,  'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'10' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'11' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'12' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'13' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'14' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'15' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'16' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'17' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'18' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'19' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'20' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'21' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'22' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'23' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'24' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'25' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'26' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'27' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'28' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'29' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);

         //Modul Absensi
         HakAkses::create([ 'user_id' =>'1' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '1']);
         HakAkses::create([ 'user_id' =>'2' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '2']);
         HakAkses::create([ 'user_id' =>'3' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'4' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'5' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'6' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'7' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'8' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'9' ,  'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'10' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'11' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'12' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'13' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'14' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'15' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'16' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'17' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'18' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'19' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'20' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'21' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'22' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'23' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'24' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'25' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'26' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'27' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'28' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'29' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);


         //Modul Asset
         HakAkses::create([ 'user_id' =>'1' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '1']);
         HakAkses::create([ 'user_id' =>'2' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '2']);
         HakAkses::create([ 'user_id' =>'3' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'4' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'5' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'6' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'7' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'8' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'9' ,  'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'10' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'11' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'12' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'13' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'14' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'15' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'16' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'17' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'18' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'19' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'20' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'21' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'22' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'23' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'24' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'25' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'26' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'27' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'28' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'29' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);


        
        
        
        }
}
