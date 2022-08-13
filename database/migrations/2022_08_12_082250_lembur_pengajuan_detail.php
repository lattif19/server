<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LemburPengajuanDetail extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_pengajuan_detail', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lembur_pengajuan_id");
            $table->date("tanggal");
            $table->boolean("hari_libur");
            $table->time("jam_masuk_kantor")->nullable();
            $table->time("jam_kerja_kantor")->nullable();
            $table->time("jam_masuk");
            $table->time("jam_pulang");
            $table->time("jam_pulang_standar")->nullable();
            $table->time("jam_lembur");
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
        Schema::dropIfExists('lembur_pengajuan_detail');
    }
}
