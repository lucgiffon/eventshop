<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Event', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            //$table->subtitle('subtitle', 500);
            $table->string('logo');
            $table->date('begindate');
            $table->date('enddate');
            $table->string('address');
            $table->string('mailcontact');
            $table->text('description');
            
            
        });
    }

    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Event');
    }
}