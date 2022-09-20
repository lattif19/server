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

class LemburSeeder extends Seeder
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

         User::create([ 'username' => "administrator",      'email' => "admin@test.com",                    'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "Administrator HRD",  'email' => "hrd@test.co.id",                    'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "approver",           'email' => "approver@test.com",                 'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "user",               'email' => "user@test.com",                     'password' => bcrypt("s2pjakarta"), ]);

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
         User::create([ 'username' => "peggy_rosa",         'email' => "peggy@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "nova_kunfianto",     'email' => "novakunfianto@ssprimadaya.co.id",   'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "priyanto",           'email' => "priyanto@ssprimadaya.co.id",        'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "enjang",             'email' => "enjang@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "zaini_abdulloh",     'email' => "zaini@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "mohamad_rizki",      'email' => "mrizki@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "belly_budiyanto",    'email' => "belly@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "s_sarto",            'email' => "ssarto@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "arif_hidayat",       'email' => "arif@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "heru_wijaya",        'email' => "heru@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "asri_ilmi_alifah",   'email' => "asri@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "longky",             'email' => "longky@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "alan_darma",         'email' => "darma@ssprimadaya.co.id",           'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "toni_palyta",        'email' => "toni@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "ng_noviardhi",       'email' => "noer_g@ssprimadaya.co.id",          'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "ferdika_hindardi",   'email' => "ferdika@ssprimadaya.co.id",         'password' => bcrypt("s2pjakarta"), ]);
         User::create([ 'username' => "putri_aprilia",      'email' => "putri@ssprimadaya.co.id",            'password' => bcrypt("s2pjakarta"), ]);




         Pegawai::create(['nik' => '20220001J',   'nama' => 'Administrator',              'user_id' => '1',    'lembur_absen_id' => '1',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'1']);
         Pegawai::create(['nik' => '20220033J',   'nama' => 'Admin HRD',                  'user_id' => '2',    'lembur_absen_id' => '1',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220002J',   'nama' => 'Approver',                   'user_id' => '3',    'lembur_absen_id' => '2',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220003J',   'nama' => 'User',                       'user_id' => '4',    'lembur_absen_id' => '3',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'5']);
         
         Pegawai::create(['nik' => '20220004J',   'nama' => 'Nur Ardhiansyah',            'user_id' => '5',     'lembur_absen_id' => '38',   'pegawai_divisi_id' => '8',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220005J',   'nama' => 'Krisdina Yulianto',          'user_id' => '6',     'lembur_absen_id' => '1',    'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220006J',   'nama' => 'Ahmad Tuanto',               'user_id' => '7',     'lembur_absen_id' => '11',   'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220007J',   'nama' => 'Lattif Priatno',             'user_id' => '8',     'lembur_absen_id' => '51',   'pegawai_divisi_id' => '1',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220008J',   'nama' => 'Hari Wibowo',                'user_id' => '9',     'lembur_absen_id' => '21',   'pegawai_divisi_id' => '2',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220009J',   'nama' => 'Arri Pradipta',              'user_id' => '10',    'lembur_absen_id' => '39',   'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220010J',   'nama' => 'Nadia Suwandy',              'user_id' => '11',    'lembur_absen_id' => '30',   'pegawai_divisi_id' => '2',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220011J',   'nama' => 'Sri Maryati',                'user_id' => '12',    'lembur_absen_id' => '3',    'pegawai_divisi_id' => '2',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220012J',   'nama' => 'Syafriyanzah',               'user_id' => '13',    'lembur_absen_id' => '34',   'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220013J',   'nama' => 'Irboni Utami',               'user_id' => '14',    'lembur_absen_id' => '53',   'pegawai_divisi_id' => '8',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220014J',   'nama' => 'Ana Malini',                 'user_id' => '15',    'lembur_absen_id' => '2',    'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220015J',   'nama' => 'Suharman Rosuli',            'user_id' => '16',    'lembur_absen_id' => '22',   'pegawai_divisi_id' => '6',   'pegawai_jabatan_id'=>'4']);
         Pegawai::create(['nik' => '20220016J',   'nama' => 'Gina Novianti',              'user_id' => '17',    'lembur_absen_id' => '6',    'pegawai_divisi_id' => '6',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220017J',   'nama' => 'Maria Friska',               'user_id' => '18',    'lembur_absen_id' => '46',   'pegawai_divisi_id' => '6',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220018J',   'nama' => 'Damar Cahyono',              'user_id' => '19',    'lembur_absen_id' => '52',   'pegawai_divisi_id' => '6',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220019J',   'nama' => 'Heri Setiawan',              'user_id' => '20',    'lembur_absen_id' => '7',    'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220020J',   'nama' => 'Edwin Basten',               'user_id' => '21',    'lembur_absen_id' => '8',    'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220021J',   'nama' => 'Shella Tanoto',              'user_id' => '22',    'lembur_absen_id' => '5',    'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'4']);
         Pegawai::create(['nik' => '20220022J',   'nama' => 'Siti Fatimah',               'user_id' => '23',    'lembur_absen_id' => '4',    'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'4']);
         Pegawai::create(['nik' => '20220023J',   'nama' => 'Engkus',                     'user_id' => '24',    'lembur_absen_id' => '12',   'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220024J',   'nama' => 'Audrey Cecilia',             'user_id' => '25',    'lembur_absen_id' => '25',   'pegawai_divisi_id' => '4',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220025J',   'nama' => 'Nabilah Syahputri',          'user_id' => '26',    'lembur_absen_id' => '28',   'pegawai_divisi_id' => '2',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220026J',   'nama' => 'Rosarina',                   'user_id' => '27',    'lembur_absen_id' => '24',   'pegawai_divisi_id' => '5',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220027J',   'nama' => 'Bramanto Seno',              'user_id' => '28',    'lembur_absen_id' => '19',   'pegawai_divisi_id' => '5',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220028J',   'nama' => 'Gadis Anindiya',             'user_id' => '29',    'lembur_absen_id' => '26',   'pegawai_divisi_id' => '4',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220029J',   'nama' => 'Peggy Rosa',                 'user_id' => '30',    'lembur_absen_id' => '18',   'pegawai_divisi_id' => '3',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220030J',   'nama' => 'Nova Kunfianto',             'user_id' => '31',    'lembur_absen_id' => '13',   'pegawai_divisi_id' => '6',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220031J',   'nama' => 'Priyanto',                   'user_id' => '32',    'lembur_absen_id' => '9',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220032J',   'nama' => 'Enjang',                     'user_id' => '33',    'lembur_absen_id' => '15',    'pegawai_divisi_id' => '2',   'pegawai_jabatan_id'=>'5']);
         Pegawai::create(['nik' => '20220033J',   'nama' => 'Zaini Abdulloh',             'user_id' => '34',    'lembur_absen_id' => '10',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220034J',   'nama' => 'Mohamad Rizki',              'user_id' => '35',    'lembur_absen_id' => '16',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220035J',   'nama' => 'Belly Budiyanto',            'user_id' => '36',    'lembur_absen_id' => '14',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220036J',   'nama' => 'Stephanus Sarto',            'user_id' => '37',    'lembur_absen_id' => '17',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220037J',   'nama' => 'Arif Hidayat',               'user_id' => '38',    'lembur_absen_id' => '20',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220038J',   'nama' => 'Heru Wijaya',                'user_id' => '39',    'lembur_absen_id' => '36',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'7']);
         Pegawai::create(['nik' => '20220039J',   'nama' => 'Asri Ismi Alifah',           'user_id' => '40',    'lembur_absen_id' => '45',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'7']);
         Pegawai::create(['nik' => '20220040J',   'nama' => 'Longky',                     'user_id' => '41',    'lembur_absen_id' => '55',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'6']);
         Pegawai::create(['nik' => '20220041J',   'nama' => 'Alan Darma',                 'user_id' => '42',    'lembur_absen_id' => '56',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'7']);
         Pegawai::create(['nik' => '20220042J',   'nama' => 'Toni Palyta',                'user_id' => '43',    'lembur_absen_id' => '31',    'pegawai_divisi_id' => '7',   'pegawai_jabatan_id'=>'8']);
         Pegawai::create(['nik' => '20220043J',   'nama' => 'NG Noviardhi',               'user_id' => '44',    'lembur_absen_id' => '33',    'pegawai_divisi_id' => '8',   'pegawai_jabatan_id'=>'3']);
         Pegawai::create(['nik' => '20220044J',   'nama' => 'Ferdika Hindardi',           'user_id' => '45',    'lembur_absen_id' => '40',    'pegawai_divisi_id' => '5',   'pegawai_jabatan_id'=>'2']);
         Pegawai::create(['nik' => '20220045J',   'nama' => 'Putri Aprilia',              'user_id' => '46',    'lembur_absen_id' => '50',    'pegawai_divisi_id' => '4',   'pegawai_jabatan_id'=>'6']);  
         




         Divisi::create(['nama' => 'IT']);
         Divisi::create(['nama' => 'Keuangan']);
         Divisi::create(['nama' => 'Akuntansi']);
         Divisi::create(['nama' => 'Sekretariat']);
         Divisi::create(['nama' => 'Projek']);
         Divisi::create(['nama' => 'Pengadaan']);
         Divisi::create(['nama' => 'HR & GA']);
         Divisi::create(['nama' => 'Niaga']);

         Jabatan::create(['nama'=> "Direktur"]);
         Jabatan::create(['nama'=> "Manager"]);
         Jabatan::create(['nama'=> "Asisten Manager"]);
         Jabatan::create(['nama'=> "Supervisor"]);
         Jabatan::create(['nama'=> "Senior Staff"]);
         Jabatan::create(['nama'=> "Staff"]);
         Jabatan::create(['nama'=> "Office Boy"]);
         Jabatan::create(['nama'=> "Driver"]); 
         
         PegawaiLevelUser::create(['nama' => 'Administrator']);
         PegawaiLevelUser::create(['nama' => 'Administrator HRD']);
         PegawaiLevelUser::create(['nama' => 'Approver']);
         PegawaiLevelUser::create(['nama' => 'User']);


         
         Modul::create(['nama' => "Sistem Pengolahan Pegawai"]);
         Modul::create(['nama' => "Sistem Pengolahan Absensi"]);
         Modul::create(['nama' => "Sistem Pengolahan Lembur"]);
         Modul::create(['nama' => "Sistem Pengolahan Kendaraan"]);
         
         
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
         HakAkses::create([ 'user_id' =>'30' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'31' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'32' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'33' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'34' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'35' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'36' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'37' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'38' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'39' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'40' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'41' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'42' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'43' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
         



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
         HakAkses::create([ 'user_id' =>'30' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'31' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'32' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'33' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'34' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'35' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'36' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'37' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'38' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'39' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'40' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'41' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'42' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'43' , 'modul_id'=>'3' , 'pegawai_level_user_id' => '4']);


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
         HakAkses::create([ 'user_id' =>'30' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'31' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'32' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'33' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'34' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'35' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'36' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'37' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'38' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'39' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'40' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'41' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'42' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'43' , 'modul_id'=>'2' , 'pegawai_level_user_id' => '4']);


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
         HakAkses::create([ 'user_id' =>'30' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'31' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'32' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'33' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'34' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'35' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'36' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'37' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'38' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'39' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'40' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'41' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'42' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
         HakAkses::create([ 'user_id' =>'43' , 'modul_id'=>'4' , 'pegawai_level_user_id' => '4']);
    
    }
}
