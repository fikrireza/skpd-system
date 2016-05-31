<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTopikPengaduan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topik_pengaduan', function(Blueprint $table){
          $table->increments('id');
          $table->string('kode_topik');
          $table->string('nama_topik');
          $table->integer('id_skpd');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
