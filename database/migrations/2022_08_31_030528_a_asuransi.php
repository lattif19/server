<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AAsuransi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_asuransi', function (Blueprint $table) {
            $table->id();
            $table->foreignId("a_kendaraan_id")->nullable();
            $table->foreignId("a_asuransi_pic_id")->nullable();
            $table->foreignId("a_jenis_asuransi_id")->nullable();   
            $table->foreignId("a_jenis_premi_id")->nullable();
            $table->string("no_polis")->nullable();
            $table->string("nama_asuransi")->nullable();
            $table->string("keterangan")->nullable();
            $table->string("biaya_premi")->nullable();
            $table->date("tanggal_mulai")->nullable();
            $table->date("tanggal_selesai")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('a_asuransi');
    }
}
