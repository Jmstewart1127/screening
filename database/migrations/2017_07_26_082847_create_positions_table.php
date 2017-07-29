<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('positions', function(Blueprint $table) {
           $table->increments('id');
           $table->integer('rating');
           $table->string('businessName')->unique();
           $table->string('positionName')->unique();
           $table->boolean('screening');
           $table->date('updated_at');
           $table->date('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('positions');
    }
}

