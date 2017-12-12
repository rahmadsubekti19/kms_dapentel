<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('pegawai', function(Blueprint $table){
            $table->foreign('kode_jabatan')->references('kode')->on('jabatan')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('kode_direktorat')->references('kode')->on('direktorat')->onDelete('Cascade')->onUpdate('Cascade');
            $table->foreign('id_role')->references('id')->on('role')->onDelete('Cascade')->onUpdate('Cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::disableForeignKeyConstraints();
        Schema::table('pegawai', function (Blueprint $table){
            $table->dropForeign('pegawai_kode_direktorat_foreign');
            $table->dropForeign('pegawai_id_role_foreign');
            $table->dropForeign('pegawai_kode_jabatan_foreign');
        });
    }
}
