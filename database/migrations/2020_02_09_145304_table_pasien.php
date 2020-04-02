<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TablePasien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_pasien', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('no_kk')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama');
            $table->char('jenis_kelamin', 1);
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->char('gol_darah', 1)->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('status_perkawinan')->nullable();
            $table->string('status_keluarga')->nullable();
            $table->string('warga_negara')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->text('alamat')->nullable();
            $table->string('no_hp',15)->nullable();
            $table->char('rt',3)->nullable();
            $table->char('rw',3)->nullable();

            $table->UnsignedInteger('asuransi_id');
            $table->string('no_asuransi');
            $table->timestamps();

            $table->foreign('asuransi_id')->references('id')->on('m_asuransi')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('m_pasien');
    }
}
