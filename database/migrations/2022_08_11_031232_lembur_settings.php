<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LemburSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_settings', function (Blueprint $table) {
            $table->id();
            $table->time("jam_masuk")->default("08:00:00");
            $table->time("jam_kerja")->default("09:00:00");
            $table->boolean("edit_jam_masuk")->default("0");
            $table->boolean("edit_jam_kerja")->default("0");
            $table->boolean("edit_jam_pulang")->default("0");
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
        Schema::dropIfExists('lembur_settings');
    }
}
