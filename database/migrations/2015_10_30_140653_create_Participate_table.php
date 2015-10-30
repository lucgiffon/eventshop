<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Participate', function(Blueprint $table) {
            $table->integer('idparticipant')->unsigned();
            $table->integer('idevent')->unsigned();    
            $table->primary(['idparticipant', 'idevent']);
            
        });
        
        Schema::table('Participate', function(Blueprint $table) {
        $table->foreign('idparticipant')->references('id')->on('Participant')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
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
        Schema::table('Participate', function(Blueprint $table) {
                $table->dropForeign('Participate_idparticipant_foreign');
                $table->dropForeign('Participate_idevent_foreign');
        });        
        Schema::drop('Participate');
    }
}
