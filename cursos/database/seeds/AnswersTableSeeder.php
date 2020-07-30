<?php

use App\Answer;
use Illuminate\Database\Seeder;

class AnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Answer::truncate();
        $faker = \Faker\Factory::create();

        // Crear niveles ficticios en la tabla
        $num_answer = 4;

        for ($j = 1; $j < 11; $j++) {
            for($i = 0; $i < $num_answer; $i++){
                Answer::create([
                    'Descrip_Resp' => $faker->sentence,
                    'Correct_Resp' => $faker->numberBetween(0,1),
                    'pregunta_id' => $j,
                ]);
            }
        }

    }
}
