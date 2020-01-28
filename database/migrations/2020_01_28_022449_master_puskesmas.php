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
            $table->integer('users_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
