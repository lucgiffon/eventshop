<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Message', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->string('email');
            $table->text('description');
            $table->integer('event_id')->unsigned();
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::table('Message', function(Blueprint $table) {
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
            $table->dropForeign('message_event_id_foreign');
        });
        Schema::drop('Message');
    }
}
