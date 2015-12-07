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
            try {
                if ($participation->participant_id % 7 != 0) {
                    $participant_id = $participation->participant_id;
                    $event_id = $participation->event_id;
                    $date1 = Event::where('id', '=', $event_id)->first()->begindate;
                    $date2 = Event::where('id', '=', $event_id)->first()->enddate;
                    $nbr_eat = 0;
                    while ($nbr_eat < 10) {
                        $date = rand_date($date1, $date2);
                        DB::table('Eat')->insert([
                            'participant_id' => $participant_id,
                            'date' => $date,
                            'event_id' => $event_id,
                        ]);
                        $nbr_eat++;
                    }
                }
            }
            catch (Exception $e) {
                    echo "Exception reçue: " . $e->getMessage();
            }
        }
    }
}
