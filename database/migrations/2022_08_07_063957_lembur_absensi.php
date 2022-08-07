<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LemburAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_absensi', function (Blueprint $table) {
            $table->id();
            $table->integer("absen_id")->nullable();
            $table->date("tanggal")->nullable();
            $table->timestamp("jam_masuk")->nullable();
            $table->timestamp("jam_pulang")->nullable();
            $table->boolean("hari_libur")->default(false);
            $table->timestamp("jam_pulang_kerja")->nullable();
            $table->timestamp("jam_pulang_sebenarnya")->nullable();
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
        Schema::dropIfExists('lembur_absensi');
    }
}
