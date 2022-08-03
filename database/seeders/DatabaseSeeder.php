<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\HakAkses;
use App\Models\Modul;
use App\Models\PegawaiLevelUser;
use App\Models\Pegawai;

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

         Pegawai::create(['nama' => 'Administrator', 'user_id' => '1' ]);
         Pegawai::create(['nama' => 'Approver', 'user_id' => '2' ]);
         Pegawai::create(['nama' => 'User', 'user_id' => '3' ]);


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
