<?php

use App\SelectAnswer;
use Illuminate\Database\Seeder;

class SelectAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        SelectAnswer::truncate();
        $faker = \Faker\Factory::create();
        $num_record = 1;
        $record1= \App\Record::all();

        foreach ($record1 as $record) {
            for ($i = 0; $i < 10; $i++) {
                SelectAnswer::create([
                    'selection' => $faker->sentence,
                    'value' => $faker->numberBetween(0,1),
                    'answer_id' => $faker->numberBetween(1,4),
                    'record_id' => $num_record,
                ]);
                if($i == 9){
                $num_record++;
                }
            }
        }
    }
}
