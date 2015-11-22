<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class EventTableSeeder extends Seeder
{
    /**
     * Return a random date.
     *
     * @param when
     * if when = null: a random date is returned
     * if when = "NOW": the current date is returned
     * if when = "FUTURE": a future date is returned
     * if when = "VERYFUTURE": a very future date is returned
     * if when = "PAST": a past date is returned
     * @return date
     */
    private function randDate($when = null)
    {
        if ($when == "NOW")
        {
            return Carbon::create();
        }
        elseif ($when == "FUTURE")
        {
            return Carbon::createFromDate(2016, rand(1, 12), rand(1, 28));
        }
        elseif ($when == "VERYFUTURE")
        {
            return Carbon::createFromDate(2017, rand(1, 12), rand(1, 28));
        }
        elseif ($when == "PAST")
        {
            return Carbon::createFromDate(2014, rand(1, 12), rand(1, 28));
        }
        else
        {
            return Carbon::createFromDate(rand(2000, 2030), rand(1, 12), rand(1, 28));
        }


    }

    /**
     * Return a random url for logo
     *
     * @return string
     */
    private function randLogo()
    {
        $color = "";
        while (strlen($color) < 6)
        {
            $color .= rand(0,9);
        }
        return "http://placehold.it/100/" . $color . "/";
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Event')->delete();

        for($i = 1; $i <= 100; ++$i)
        {
            if ($i % 3 == 0)
            {
                $beginDate = $this->randDate("NOW");
                $endDate = $this->randDate("FUTURE");
            }
            elseif ($i % 3 == 1)
            {
                $beginDate = $this->randDate("FUTURE");
                $endDate = $this->randDate("VERYFUTURE");
            }
            else
            {
                $beginDate = $this->randDate("PAST");
                $endDate = $this->randDate("NOW");
            }
            if ($i % 33 == 0)
            {
                $selected = True;
            }
            else
            {
                $selected = False;
            }
            $logo = $this->randLogo();
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
                                                        deserunt mollit anim id est laborum.",
                'selected' => $selected
            ]);
        }
    }
}
