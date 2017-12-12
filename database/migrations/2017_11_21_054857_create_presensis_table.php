<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePresensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_pegawai')->index();
            $table->unsignedInteger('id_notulensi');
            $table->timestamps();

            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('id_notulensi')->references('id')->on('notulensi')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('presensi');
    }
}
