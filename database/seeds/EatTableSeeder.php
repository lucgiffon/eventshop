<?php

use Illuminate\Database\Seeder;
use App\Event;

class EatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Eat')->delete();

        for($i = 1; $i <= 500; ++$i)
        {
            DB::table('Eat')->insert([
                //id,
                'idparticipant' => $i,
                //  . ((int) $i/6 + 1) . ";"
                'date' => DB::table('Event')->,
                'idevent' => (int) $i/6
            ]);


        }
    }
}
