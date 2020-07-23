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
        // Vaciar la tabla.
         Answer::truncate();
         $faker = \Faker\Factory::create();
        Answer::create([
            'Descrip_Resp' => 'Respuesta de prueba',
            'Correct_Resp' => false,
        ]);
         // Crear respuestas ficticias  en la tabla
         for ($i = 0; $i < 25; $i++) {
         Answer::create([
         'Descrip_Resp' => $faker->paragraph,
         'Correct_Resp' => $faker->boolean,
         ]);
         }

    }
}
