<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProfileColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table){
          $table->string('noktp')->after('id_skpd')->nullable();
          $table->string('notelp')->after('noktp')->nullable();
          $table->string('jeniskelamin')->after('notelp')->nullable();
          $table->string('alamat')->after('jeniskelamin')->nullable();
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
