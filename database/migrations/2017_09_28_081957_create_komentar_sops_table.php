<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarSopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_sop', function(Blueprint $table){
            $table->increments('id');
            $table->unSignedInteger('id_sop');
            $table->integer('nik_pegawai')->index();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('id_sop')->references('id')->on('sop')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_sop');
    }
}
