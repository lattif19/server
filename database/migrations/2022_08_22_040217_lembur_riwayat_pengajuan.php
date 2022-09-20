<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LemburRiwayatPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_riwayat_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("lembur_pengajuan_id");
            $table->text("status_pengajuan");
            $table->text("komentar")->nullable();
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
        Schema::dropIfExists('lembur_riwayat_pengajuan');
    }
}
