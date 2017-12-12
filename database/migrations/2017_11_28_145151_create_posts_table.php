<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thread', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nik_pegawai')->index();
            $table->text('judul');
            $table->text('artikel');
            $table->timestamps();

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
        Schema::dropIfExists('thread');
    }
}
