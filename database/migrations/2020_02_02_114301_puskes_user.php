<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PuskesUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puskes_user', function (Blueprint $table) {
            $table->Increments('id');
            $table->Integer('puskes_id')->unsigned()->nullable();
            $table->Integer('users_id')->unsigned()->nullable();
            $table->timestamps();
            
            $table->foreign('puskes_id')->references('id')->on('m_puskesmas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('puskes_user');
    }
}
