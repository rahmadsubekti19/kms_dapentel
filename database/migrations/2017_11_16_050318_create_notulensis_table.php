<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotulensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_direktorat')->index();
            $table->date('tgl_dibuat');
            $table->string('tempat');
            $table->text('agenda');
            $table->integer('nik_pegawai')->index();
            $table->text('topik_bahasan');
            $table->text('catatan_diskusi');
            $table->text('kep_tindakan');
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
        Schema::dropIfExists('notulensi');
    }
}
