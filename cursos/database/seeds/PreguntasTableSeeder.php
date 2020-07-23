<?php

use App\Preguntas;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PreguntasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Preguntas::truncate();

        $faker = \Faker\Factory::create();


        $valor = 1;

        // Crear productos ficticios en la tabla
        for($i = 0; $i < 20; $i++) {
            Preguntas::create([
                'descripcion' => $faker->sentence,
                'valor' => $valor,
            ]);
        }
    }
}
