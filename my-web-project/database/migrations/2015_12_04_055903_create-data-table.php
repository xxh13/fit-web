<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data',function(Blueprint $table){
            $table->increments('id');
            $table->string('user_id');
            $table->integer('sbp');
            $table->integer('dbp');
            $table->integer('heart_rate');
            $table->integer('steps');
            $table->integer('sleep_time');
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
        Schema::drop('data');
    }
}
