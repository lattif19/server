<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

            /*
            | Level User adalah :
            |  1. Administrator
            |  2. Administrator HRD
            |  3. Approver
            |  4. User
            | 
            | Modul yang tersedia adalah : 
            |  1. Pegawai
            |  2. Absensi
            |  3. Lembur
            |  4. Asset
            */
            
            Gate::define("pegawaiAdmin",    function(){ return $this->cek_modul_pegawai() == 1 ; });
            Gate::define("pegawaiHrd",      function(){ return $this->cek_modul_pegawai() == 2 ; });
            Gate::define("pegawaiApprove",  function(){ return $this->cek_modul_pegawai() == 3 ; });

            Gate::define("absensiAdmin",    function(){ return $this->cek_modul_absensi() == 1 ; });
            Gate::define("absensiHrd",      function(){ return $this->cek_modul_absensi() == 2 ; });
            Gate::define("absensiApprove",  function(){ return $this->cek_modul_absensi() == 3 ; });

            Gate::define("lemburAdmin",    function(){ return $this->cek_modul_lembur() == 1 ; });
            Gate::define("lemburHrd",      function(){ return $this->cek_modul_lembur() == 2 ; });
            Gate::define("lemburApprove",  function(){ return $this->cek_modul_lembur() == 3 ; });
            Gate::define("lemburUser",  function(){ return $this->cek_modul_lembur() == 4 ; });

            Gate::define("assetAdmin",    function(){ return $this->cek_modul_asset() == 1 ; });
            Gate::define("assetHrd",      function(){ return $this->cek_modul_asset() == 2 ; });
            Gate::define("assetApprove",  function(){ return $this->cek_modul_asset() == 3 ; });
            
    }

    public function cek_modul_pegawai(){ 
        return DB::table("pegawai_hak_akses")->where("user_id", auth()->user()->id)->where("modul_id", "1")->get()[0]->pegawai_level_user_id; 
    }

    public function cek_modul_absensi(){ 
        return DB::table("pegawai_hak_akses")->where("user_id", auth()->user()->id)->where("modul_id", "2")->get()[0]->pegawai_level_user_id; 
    }

    public function cek_modul_lembur(){ 
        return DB::table("pegawai_hak_akses")->where("user_id", auth()->user()->id)->where("modul_id", "3")->get()[0]->pegawai_level_user_id; 
    }

    public function cek_modul_asset(){ 
        return DB::table("pegawai_hak_akses")->where("user_id", auth()->user()->id)->where("modul_id", "4")->get()[0]->pegawai_level_user_id; 
    }
}
