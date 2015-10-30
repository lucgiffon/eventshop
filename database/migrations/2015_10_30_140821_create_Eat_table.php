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
            $table->integer('idparticipant')->unsigned();
            $table->date('date');
            $table->integer('idevent')->unsigned();
            $table->primary(['idparticipant', 'date']);
        });
        Schema::table('Eat', function(Blueprint $table) {
        $table->foreign('idevent')->references('id')->on('Event')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');

        $table->foreign('idparticipant')->references('id')->on('Participant')
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
                $table->dropForeign('Eat_idevent_foreign');
                $table->dropForeign('Eat_idparticipant_foreign');
        });        
        Schema::drop('Eat');  
    }
}
