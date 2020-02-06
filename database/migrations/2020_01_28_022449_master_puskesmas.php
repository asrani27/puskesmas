<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MasterPuskesmas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_puskesmas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama');
            $table->text('alamat');
            $table->string('telp');
            $table->string('kecamatan');
            $table->string('kelurahan');
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
        Schema::dropIfExists('m_puskesmas');
    }
}
