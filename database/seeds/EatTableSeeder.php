<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Participate;

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
            $idevent = Participate::where('idparticipant', '=', $i)->first()->idevent;
            $date = Event::where('id', '=', $idevent)->firstOrFail()->date;
            DB::table('Eat')->insert([
                'idparticipant' => $i,
                'date' => $date,
                'idevent' => idevent,
                ]);


        }
    }
}
