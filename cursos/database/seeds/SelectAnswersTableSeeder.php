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
        // Crear respuestas ficticias  en la tabla
        for ($i = 0; $i < 10; $i++) {
            SelectAnswer::create([
                'Select_Resp' => $faker->sentence,
                'Nota_rs' => $faker->numberBetween(1,10),
            ]);
        }

    }
}
