<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

class LemburCatatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_catatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('lembur_pengajuan_id');
            $table->foreignId('lembur_absensi_id')->nullable(); //foreignId untuk menampilkan perhitungan Jam 
            $table->date('tanggal');
            $table->boolean('hari_libur')->default(false);
            $table->text('keterangan');
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
        Schema::dropIfExists('lembur_catatan');
    }
}
