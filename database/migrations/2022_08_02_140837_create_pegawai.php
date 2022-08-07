<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->uniqid()->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('pegawai_divisi_id')->nullable();
            $table->foreignId('pegawai_jabatan_id')->nullable();
            $table->foreignId('lembur_absen_id')->nullable();
            $table->foreignId('lembur_approve_id')->nullable();
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
        Schema::dropIfExists('pegawai');
    }
}
