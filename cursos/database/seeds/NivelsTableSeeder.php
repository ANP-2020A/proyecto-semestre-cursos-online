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
        $curso1 = \App\Cursos::all();
        $num_curso = 1;
        foreach ($curso1 as $cursos) {
                for($i = 1; $i < $num_nivel; $i++){
                    Nivel::create([
                        'Titulo' => $faker->sentence,
                        'Numero' => $i,
                        'Descripcion' => $faker->paragraph,
                        'curso_id'=>$num_curso
                    ]);
                    if ($i==5){
                        $num_curso++;
                    }
                }

        }
    }
}
