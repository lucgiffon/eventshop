<?php

use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Message')->delete();

        for($i = 1; $i <= 100; ++$i) {

            DB::table('Message')->insert([
                //'id' => 0,
                'title' => "Titre" . $i,
                'name' => "User" . $i,
                'email' => "message" . $i . "@eventshop.mail",
                'description' => "Description" . $i . ": Raptim igitur properantes ut motus sui
                                                    rumores celeritate nimia praevenirent, vigore
                                                    corporum ac levitate confisi per flexuosas semitas
                                                    ad summitates collium tardius evadebant. et cum
                                                    superatis difficultatibus arduis ad supercilia venissent
                                                    fluvii Melanis alti et verticosi, qui pro muro tuetur
                                                    accolas circumfusus, augente nocte adulta terrorem quievere
                                                    paulisper lucem opperientes. arbitrabantur enim nullo
                                                    inpediente transgressi inopino adcursu adposita quaeque
                                                    vastare, sed in cassum labores pertulere gravissimos.",
                'event_id' => $i
            ]);
        }

    }
}
