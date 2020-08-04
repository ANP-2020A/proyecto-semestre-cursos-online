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
        $num_question = 1;
        $question1= \App\Question::all();

        foreach ($question1 as $question) {
                for($i = 1; $i < $num_answer; $i++){
                    Answer::create([
                        'description' => $faker->sentence,
                        'correct' => $faker->boolean,
                        'question_id' => $num_question,
                    ]);
                    if ($i==4){
                        $num_question++;
                    }
                }
            }
    }
}
