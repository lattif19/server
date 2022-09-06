<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKendaraansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_kendaraan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->nullable();
            $table->foreignId('a_jenis_kendaraan_id')->nullable();
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->date('tanggal_pembelian')->nullable();
            $table->string('no_polisi');
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
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
        Schema::dropIfExists('a_kendaraan');
    }
}
