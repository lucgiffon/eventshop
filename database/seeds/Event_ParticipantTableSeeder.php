<?php

use Illuminate\Database\Seeder;

class Event_ParticipantTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('event_participant')->delete();

        for ($i = 1; $i <= 1000; ++$i) {
            try {
                DB::table('event_participant')->insert([
                    'participant_id' => rand(1, 1000),
                    'event_id' => rand(1, 100)
                ]);
            }
            catch (Exception $e) {
                echo "Exception reçue: " . $e->getMessage();
            }

        }
    }
}
