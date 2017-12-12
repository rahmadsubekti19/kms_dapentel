<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKnowledgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('knowledge', function(Blueprint $table){
            $table->increments('id');
            $table->integer('nik_pegawai')->index();
            $table->integer('kode_direktorat')->index();
            $table->text('judul');
            $table->enum('jenis',['Tacit Knowledge','Explicit Knowledge']);
            $table->enum('status', ['Diterima', 'Dipertimbangkan', 'Ditolak'])->default('Dipertimbangkan');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            $table->timestamps();

            $table->foreign('nik_pegawai')->references('nik')->on('pegawai')->onUpdate('Cascade')->onDelete('Cascade');
            $table->foreign('kode_direktorat')->references('kode')->on('direktorat')->onUpdate('Cascade')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('knowledge');
    }
}
