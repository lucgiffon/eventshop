<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Event', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            //$table->subtitle('subtitle', 500);
            $table->string('logo')->nullable();
            $table->date('begindate')->nullable();
            $table->date('enddate')->nullable();
            $table->string('address')->nullable();
            $table->string('mailcontact')->nullable();
            $table->text('description')->nullable();
            $table->boolean('selected');
            $table->boolean('isactive')->default(false);
            $table->timestamp('created_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')
                ->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Event');
    }
}
