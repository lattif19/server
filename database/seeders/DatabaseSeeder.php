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

         User::create([
            'username' => "administrator",
            'email' => "administrator@gmail.com",
            'password' => bcrypt("password"),
         ]);

         User::create([
            'username' => "approver",
            'email' => "approver@gmail.com",
            'password' => bcrypt("password"),
         ]);

         User::create([
            'username' => "user",
            'email' => "user@gmail.com",
            'password' => bcrypt("password"),
         ]);

         Jabatan::create(['nama'=> "Direktur"]);
         Jabatan::create(['nama'=> "Manager"]);
         Jabatan::create(['nama'=> "Supervisor"]);
         Jabatan::create(['nama'=> "Senior Staff"]);
         Jabatan::create(['nama'=> "Staff"]);
         Jabatan::create(['nama'=> "Office Boy"]);


         Divisi::create(['nama' => 'IT']);
         Divisi::create(['nama' => 'Keuangan']);
         Divisi::create(['nama' => 'Akuntansi']);
         Divisi::create(['nama' => 'Sekretariat']);
         Divisi::create(['nama' => 'Projek']);
         Divisi::create(['nama' => 'Pengadaan']);
         Divisi::create(['nama' => 'HR & GA']);

         Pegawai::create(['pegawai_divisi_id' => '1', 'pegawai_jabatan_id'=>'1', 'nama' => 'Administrator', 'user_id' => '1' ]);
         Pegawai::create(['pegawai_divisi_id' => '1', 'pegawai_jabatan_id'=>'2', 'nama' => 'Approver', 'user_id' => '2' ]);
         Pegawai::create(['pegawai_divisi_id' => '1', 'pegawai_jabatan_id'=>'5', 'nama' => 'User', 'user_id' => '3' ]);


         PegawaiLevelUser::create(['nama' => 'Administrator']);
         PegawaiLevelUser::create(['nama' => 'Administrator HRD']);
         PegawaiLevelUser::create(['nama' => 'Approver']);
         PegawaiLevelUser::create(['nama' => 'User']);


         
         Modul::create(['nama' => "Sistem Pengolahan Pegawai"]);
         Modul::create(['nama' => "Sistem Pengolahan Absensi"]);
         Modul::create(['nama' => "Sistem Pengolahan Lembur"]);
         Modul::create(['nama' => "Sistem Pengolahan Asset"]);
         
         
         
         HakAkses::create([ 'user_id' =>'1' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '1']);
         HakAkses::create([ 'user_id' =>'2' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '3']);
         HakAkses::create([ 'user_id' =>'3' , 'modul_id'=>'1' , 'pegawai_level_user_id' => '4']);
        
        
        
        }
}
