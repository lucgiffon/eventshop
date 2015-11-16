<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSelectedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EventSelected', function(Blueprint $table) {
            $table->integer('event_id')->unsigned();
            $table->primary(['event_id']);
        });
        Schema::table('EventSelected', function(Blueprint $table) {
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
        Schema::table('EventSelected', function(Blueprint $table) {
            $table->dropForeign('EventSelected_event_id_foreign');
        });
        Schema::drop('EventSelected');
    }
}
