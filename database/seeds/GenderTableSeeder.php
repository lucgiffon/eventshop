<?php

use Illuminate\Database\Seeder;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Gender')->delete();

        DB::table('Gender')->insert([
            'id' => 1,
            'name' => "Monsieur"
        ]);

        DB::table('Gender')->insert([
            'id' => 2,
            'name' => "Madame"
        ]);
    }
}
