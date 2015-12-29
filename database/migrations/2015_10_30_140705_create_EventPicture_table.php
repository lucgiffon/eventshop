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
            $table->integer('event_id')->unsigned();
            $table->string('picture')->unique();
            $table->boolean('isprincipal');
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
        Schema::table('EventPicture', function(Blueprint $table) {
        $table->foreign('event_id')->references('id')->on('Event')
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
                $table->dropForeign('EventPicture_event_id_foreign');
        });        
        Schema::drop('EventPicture');    
        
    }
}
