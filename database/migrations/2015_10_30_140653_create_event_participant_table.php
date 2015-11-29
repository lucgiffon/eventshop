<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_participant', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id')->unsigned();
            $table->integer('event_id')->unsigned();
            $table->unique(['participant_id', 'event_id']);
//            $table->primary(['participant_id', 'event_id']);
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
        
        Schema::table('event_participant', function(Blueprint $table) {
        $table->foreign('participant_id')->references('id')->on('Participant')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
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
        Schema::table('event_participant', function(Blueprint $table) {
                $table->dropForeign('event_participant_participant_id_foreign');
                $table->dropForeign('event_participant_event_id_foreign');
        });        
        Schema::drop('event_participant');
    }
}
