<?php

use Illuminate\Database\Seeder;

class ParticipantTableSeeder extends Seeder
{

    /**
     * Generate a random phone number starting with 06.
     *
     * @return string
     */
    public function randPhoneNumber()
    {
        $phoneNumber = "06";
        while (strlen($phoneNumber) < 10)
        {
            $phoneNumber .= rand(0,9);
        }
        return $phoneNumber;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Participant')->delete();

        for($i = 1; $i <= 1000; ++$i)
        {
            $phoneNumber = $this->randPhoneNumber();
            DB::table('Participant')->insert([
                //id,
                'email' => "participant" . $i . "@eventshop.mail",
                'idgender' => rand(1, 2),
                'lastname' => "lastname" . $i,
                'firstname' => "firstname" . $i,
                'idexpertise' => rand(1,3),
                'phonenumber' => $phoneNumber,
                'address' => $i . "avenue du participant - 13009 Luminy",
                'department' => "departement" . $i,
                'country' => "pays" . $i

            ]);


        }
    }
}
