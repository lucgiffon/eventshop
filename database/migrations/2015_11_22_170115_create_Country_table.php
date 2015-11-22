<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Country', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('iso2')->nullable();
            $table->text('short_name')->default("");
            $table->text('long_name')->default("");
            $table->string('iso3')->nullable();
            $table->string('numcode')->nullable();
            $table->text('un_member')->nullable();
            $table->string('calling_code')->nullable();
            $table->string('cctld')->nullable();
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
        Schema::drop('Country');
    }
}
