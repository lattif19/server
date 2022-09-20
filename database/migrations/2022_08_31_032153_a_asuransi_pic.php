<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AAsuransiPic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('a_asuransi_pic', function (Blueprint $table) {
            $table->id();
            $table->string("nama")->nullable();
            $table->string("perusahaan")->nullable();
            $table->string("alamat_perusahaan")->nullable();
            $table->string("telepon_perusahaan")->nullable();
            $table->string("telepon_pribadi")->nullable();
            $table->string("email_perusahaan")->nullable();
            $table->string("email_pic")->nullable();
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
        Schema::dropIfExists('a_asuransi_pic');
    }
}
