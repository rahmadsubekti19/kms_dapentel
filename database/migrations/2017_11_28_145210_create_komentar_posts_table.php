<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komentar_thread', function (Blueprint $table) {
            $table->increments('id');
            $table->unSignedInteger('id_thread');
            $table->integer('nik_pegawai')->index();
            $table->text('deskripsi');
            $table->timestamps();

            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('id_thread')->references('id')->on('thread')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komentar_thread');
    }
}
