<?php


use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ExpertiseTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(EventpictureTableSeeder::class);
        $this->call(ParticipantTableSeeder::class);
        $this->call(Event_ParticipantTableSeeder::class);
        $this->call(EatTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        Model::reguard();
    }
}
