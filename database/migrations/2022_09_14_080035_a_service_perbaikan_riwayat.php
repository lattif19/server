<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AServicePerbaikanRiwayat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_service_perbaikan_riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId("a_service_perbaikan_id")->nullable();
            $table->foreignId("user_id");
            $table->text("keterangan");
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
        Schema::dropIfExists('a_service_perbaikan_riwayat');
    }
}
