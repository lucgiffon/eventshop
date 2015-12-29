<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Eat', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('participant_id')->unsigned();
            $table->date('date');
            $table->integer('event_id')->unsigned();
            $table->unique(['participant_id', 'date']);
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('Eat', function(Blueprint $table) {
        $table->foreign('event_id')->references('id')->on('Event')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');

        $table->foreign('participant_id')->references('id')->on('Participant')
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
        Schema::table('Eat', function(Blueprint $table) {
        $table->dropForeign('Eat_event_id_foreign');
        $table->dropForeign('Eat_participant_id_foreign');
    });
        Schema::drop('Eat');
    }
}
