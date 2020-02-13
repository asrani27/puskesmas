<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PasienPuskes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien_puskes', function (Blueprint $table) {
            $table->Increments('id');
            $table->UnsignedInteger('pasien_id');
            $table->UnsignedInteger('puskes_id');
            $table->foreign('pasien_id')->references('id')->on('m_pasien')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('puskes_id')->references('id')->on('m_puskesmas')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('pasien_puskes');
    }
}
