<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Event_Participant;

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

        foreach(Event_Participant::all() as $participation)
        {
            if ($participation->idparticipant % 2 == 0)
            {
                $participant_id = $participation->participant_id;
                $event_id = $participation->event_id;
                $date = Event::where('id', '=', $event_id)->first()->begindate;
                DB::table('Eat')->insert([
                    'participant_id' => $participant_id,
                    'date' => $date,
                    'event_id' => $event_id,
                ]);
            }
        }
    }
}
