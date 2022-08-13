<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LemburPengajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_pengajuan', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id");
            $table->text("periode");
            $table->time("total_biasa")->nullable();
            $table->time("total_libur")->nullable();
            $table->text("status")->nullable();
            $table->text("keterangan")->nullable();
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
        Schema::dropIfExists('lembur_pengajuan');
    }
}
