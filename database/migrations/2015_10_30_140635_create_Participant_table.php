<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Participant', function(Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->integer('idgender')->unsigned();
            $table->string('lastname');
            $table->string('firstname');
            $table->integer('idexpertise')->unsigned();
            $table->string('phonenumber');
            $table->string('address');
            $table->string('department');
            $table->string('country');            
        });
        
        Schema::table('Participant', function(Blueprint $table) {
        $table->foreign('idgender')->references('id')->on('Gender')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
        $table->foreign('idexpertise')->references('id')->on('Expertise')
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
        Schema::table('Participant', function(Blueprint $table) {
                $table->dropForeign('Participant_idgender_foreign');
                $table->dropForeign('Participant_idexpertise_foreign');
        });        
        Schema::drop('Participant');
    }
}
