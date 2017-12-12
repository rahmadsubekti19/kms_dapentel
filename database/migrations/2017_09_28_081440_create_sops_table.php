<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('sop', function(Blueprint $table){
            $table->increments('id');
            $table->integer('nik_pegawai')->index();
            $table->integer('kode_direktorat')->index();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file');
            $table->text('versi');
            $table->date('tgl_dibuat');
            $table->integer('jumlah_acuan');
            $table->timestamps();

            $table->foreign('kode_direktorat')->references('kode')->on('direktorat')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sop');
    }
}
