<?php

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Message')->delete();

        DB::table('Event')->insert([
            //'id' => 0,
            'title' => "Titre" . $i,
            'logo' => $logo,
            'begindate' => $beginDate,
            'enddate' => $endDate,
            'address' => $i . " rue de l'évènement - 1309" . $i . " EventShopCity",
            'mailcontact' => "event" . $i . "@eventshop.mail",
            'description' => "Description" . $i . ": Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                        sed do eiusmod tempor incididunt ut labore et dolore magna
                                                        aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                                                        ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                                        Duis aute irure dolor in reprehenderit in voluptate velit
                                                        esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                                                        occaecat cupidatat non proident, sunt in culpa qui officia
                                                        deserunt mollit anim id est laborum."
        ]);    }
}
