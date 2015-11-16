<?php
/**
 * Created by PhpStorm.
 * User: luc
 * Date: 13/11/15
 * Time: 06:56
 */

use Illuminate\Database\Seeder;

class EventSelectedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('EventSelected')->delete();

        for($i = 1; $i <= 3; ++$i)
        {
            DB::table('EventSelected')->insert([
                'event_id' => rand(1,100)
            ]);
        }
    }
}