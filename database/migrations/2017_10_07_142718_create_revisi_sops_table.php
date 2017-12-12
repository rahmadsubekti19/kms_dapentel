<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevisiSopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revisi_sop', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_pegawai')->index();
            $table->unSignedInteger('id_sop');
            $table->enum('status', ['Diterima', 'Dipertimbangkan', 'Ditolak'])->default('Dipertimbangkan');
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('id_sop')->references('id')->on('sop')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revisi_sop');
    }
}
