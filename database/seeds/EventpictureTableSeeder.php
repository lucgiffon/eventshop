<?php

use Illuminate\Database\Seeder;

class EventpictureTableSeeder extends Seeder
{

    /**
     * Generate a random url for picture.
     *
     * @return string
     */
    private function randPicture()
    {
        $color = "";
        while (strlen($color) < 6)
        {
            $color .= rand(0,9);
        }
        return "http://placehold.it/1000/" . $color . "/";
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EventPicture')->delete();

        for($i = 1; $i <= 300; ++$i)
        {
            $picture = $this->randPicture();
            if ($i % 3 == 0)
            {
                $isprincipal = 1;
            }
            else
            {
                $isprincipal = 0;
            }
            $event_id = (int) ($i/3);
            if ($event_id < 1)
            {
                $event_id += 1;
            }
            elseif ($event_id > 100)
            {
                $event_id -= 1;
            }
            DB::table('EventPicture')->insert([
                //id,
                'event_id' => $event_id,
                'picture' => $picture,
                'isprincipal' => $isprincipal,
            ]);


        }

    }
}
