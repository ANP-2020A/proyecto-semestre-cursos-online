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
        $num_nivel=1;
        $nivel1 = \App\Nivel::all();

        foreach ($nivel1 as $nivel) {
            if ($num_nivel==26){
                break;
            }
                for($i = 1; $i < $num_preguntas; $i++){
                    Preguntas::create([
                        'descripcion' => $faker->sentence,
                        'valor' => 1,
                        'nivel_id' => $num_nivel,
                    ]);

                    if ($i==10){
                        $num_nivel++;

                    }
                }
        }
    }
}
