<?php

use Illuminate\Database\Seeder;

class ExpertiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Expertise')->delete();

        DB::table('Expertise')->insert([
            'id' => 1,
            'name' => "débutant"
        ]);

        DB::table('Expertise')->insert([
            'id' => 2,
            'name' => "confirmé"
        ]);

        DB::table('Expertise')->insert([
            'id' => 3,
            'name' => "expert"
        ]);
    }
}
