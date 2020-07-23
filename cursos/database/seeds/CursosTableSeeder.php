<?php

use App\Cursos;
use Illuminate\Database\Seeder;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Cursos::truncate();
        $faker = \Faker\Factory::create();

        // Crear cursos ficticios en la tabla
        for($i = 0; $i < 10; $i++)
        {
            Cursos::create([
                'Nombre'=> $faker->sentence,
                'Descripcion'=> $faker->paragraph,
                'Tipo'=> $faker->word,
                'FechaInicio'=> $faker->date('Y-m-d','now'),
                'Niveles'=> $faker->numberBetween(1,6),
                ]);
        }
    }
}
