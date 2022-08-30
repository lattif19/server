<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AServicePerbaikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_service_perbaikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('a_kendaraan_id')->nullable();
            $table->foreignId('a_jenis_service_id')->nullable();
            $table->foreignId('a_status_perbaikan_id')->nullable();
            $table->string('nama_bengkel');
            $table->text('keterangan');
            $table->date('tanggal_booking')->nullable();
            $table->date('tanggal_masuk')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('estimasi')->nullable();
            $table->string('biaya')->nullable();
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
        Schema::dropIfExists('a_service_perbaikan');
    }
}
