<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitorTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor', function(Blueprint $table){
            $table->increments('id');
            $table->string('visitor_ip')->unique();
            $table->string('visitor_browser');
            $table->smallInteger('visitor_hour');
            $table->smallInteger('visitor_minute');
            $table->smallInteger('visitor_day');
            $table->smallInteger('visitor_month');
            $table->smallInteger('visitor_year');
            $table->string('visitor_refferer');
            $table->string('visitor_page');
            $table->timestamp('visitor_date');
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
