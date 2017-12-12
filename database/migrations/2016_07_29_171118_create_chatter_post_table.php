<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateChatterPostTable extends Migration
{
    public function up()
    {
        Schema::create('chatter_post', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('chatter_discussion_id')->unsigned();
            $table->integer('user_id')->index();
            $table->text('body');
            $table->timestamps();

             $table->foreign('chatter_discussion_id')->references('id')->on('chatter_discussion')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
            $table->foreign('user_id')->references('nik')->on('pegawai')
                        ->onDelete('cascade')
                        ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::drop('chatter_post');
    }
}
