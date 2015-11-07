<?php

use Illuminate\Database\Seeder;

class ParticipateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Participate')->delete();

        for ($i = 1; $i <= 100; ++$i) {
            DB::table('Participate')->insert([
                'idparticipant' => rand(1, 1000),
                'idevent' => rand(1, 100)
            ]);

        }
    }
}
