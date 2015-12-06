<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\Event_Participant;
use App\Eat;

class EatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function rand_date($min_date, $max_date) {
            /* Gets 2 dates as string, earlier and later date.
               Returns date in between them.
            */

            $min_epoch = strtotime($min_date);
            $max_epoch = strtotime($max_date);

            $rand_epoch = rand($min_epoch, $max_epoch);

            return date('Y-m-d', $rand_epoch);
        }

        DB::table('Eat')->delete();

        foreach(Event_Participant::all() as $participation)
    {
            $participant_id = $participation->participant_id;
            $event_id = $participation->event_id;

            $event = Event::find($event_id);

            for($i = 0; $i < 5; $i++)
            {
                $date = rand_date($event->begindate, $event->enddate);

                $eat = Eat::where('date', $date)->where('participant_id', $participant_id)->first();

                if(!count($eat))
                    DB::table('Eat')->insert([
                        'participant_id' => $participant_id,
                        'date' => $date,
                        'event_id' => $event_id,
                    ]);
            }
        }
    }
}
