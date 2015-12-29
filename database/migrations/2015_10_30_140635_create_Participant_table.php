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
            $table->string('email');
            $table->integer('gender_id')->unsigned();
            $table->string('lastname');
            $table->string('firstname');
            $table->integer('expertise_id')->unsigned();
            $table->string('phonenumber');
            $table->string('address');
            $table->string('department');
            $table->integer('country_id')->unsigned();
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
        
        Schema::table('Participant', function(Blueprint $table) {
        $table->foreign('gender_id')->references('id')->on('Gender')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
        $table->foreign('expertise_id')->references('id')->on('Expertise')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');
        $table->foreign('country_id')->references('id')->on('Country')
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
                $table->dropForeign('Participant_gender_id_foreign');
                $table->dropForeign('Participant_expertise_id_foreign');
                $table->dropForeign('Participant_country_id_foreign');
        });        
        Schema::drop('Participant');
    }
}
