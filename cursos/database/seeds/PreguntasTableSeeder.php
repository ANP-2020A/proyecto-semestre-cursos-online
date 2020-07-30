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

        // Crear niveles ficticios en la tabla
        $num_preguntas = 11;

        for ($j = 1; $j < 10; $j++) {
            for($i = 1; $i < $num_preguntas; $i++){
                Preguntas::create([
                    'descripcion' => $faker->sentence,
                    'valor' => 1,
                    'nivel_id' => $j,
                ]);
            }
        }

    }
}
