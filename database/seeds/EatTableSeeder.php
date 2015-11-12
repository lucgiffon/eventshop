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

        foreach(Participate::all() as $participation)
        {
            if ($participation->idparticipant % 2 == 0)
            {
                $idparticipant = $participation->idparticipant;
                $idevent = $participation->idevent;
                $date = Event::where('id', '=', $idevent)->first()->begindate;
                DB::table('Eat')->insert([
                    'idparticipant' => $idparticipant,
                    'date' => $date,
                    'idevent' => $idevent,
                ]);
            }
        }
    }
}
