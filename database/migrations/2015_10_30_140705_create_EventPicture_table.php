<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPictureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventPicture', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('idevent')->unsigned();
            $table->string('picture')->unique();
            $table->boolean('isprincipal');
        });
        
        Schema::table('EventPicture', function(Blueprint $table) {
        $table->foreign('idevent')->references('id')->on('Event')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
        });    
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('EventPicture', function(Blueprint $table) {
                $table->dropForeign('EventPicture_idevent_foreign');
        });        
        Schema::drop('EventPicture');    
        
    }
}
