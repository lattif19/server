<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class APajak extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_pajak', function (Blueprint $table) {
            $table->id();
            $table->foreignId('a_kendaraan_id');
            $table->foreignId('a_jenis_pajak_id'); //Belum
            $table->date('tanggal_jatuh_tempo')->nullable();
            $table->date('status_pembayaran')->nullable();
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
        Schema::dropIfExists('a_pajak');
    }
}
