<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Question::truncate();
        $faker = \Faker\Factory::create();

        // Crear niveles ficticios en la tabla
        $num_questions = 11;
        $num_level=1;
        $level1 = \App\Level::all();

        foreach ($level1 as $level) {
            if ($num_level==26){
                break;
            }
            for($i = 1; $i < $num_questions; $i++){
                Question::create([
                    'description' => $faker->sentence,
                    'value' => 1,
                    'level_id' => $num_level,
                ]);

                if ($i==10){
                    $num_level++;

                }
            }
        }
    }
}
