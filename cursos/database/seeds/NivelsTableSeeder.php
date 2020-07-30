<?php

use App\Nivel;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class NivelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Nivel::truncate();
        $faker = \Faker\Factory::create();

        // Crear niveles ficticios en la tabla
        $num_nivel = 6;

        for ($j = 1; $j < 22; $j++) {
            for($i = 1; $i < $num_nivel; $i++){
                Nivel::create([
                    'Titulo' => $faker->sentence,
                    'Numero' => $i,
                    'Descripcion' => $faker->paragraph,
                    'curso_id' => $j,
                ]);
            }
        }
    }
}
