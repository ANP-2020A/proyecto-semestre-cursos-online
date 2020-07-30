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
        $num_answer = 5;
        $num_preguntas = 1;
        $preguntas1= \App\Preguntas::all();

        foreach ($preguntas1 as $preguntas) {
            if ($num_preguntas==101){
                break;
            }
                for($i = 1; $i < $num_answer; $i++){
                    Answer::create([
                        'Descrip_Resp' => $faker->sentence,
                        'Correct_Resp' => $faker->boolean,
                        'pregunta_id' => $num_preguntas,
                    ]);
                    if ($i==4){
                        $num_preguntas++;
                    }

                }
            }
    }
}
