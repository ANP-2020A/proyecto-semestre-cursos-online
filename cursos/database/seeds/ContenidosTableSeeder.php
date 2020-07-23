<?php

use App\Contenido;
use Illuminate\Database\Seeder;

class ContenidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Contenido::truncate();
        $faker = \Faker\Factory::create();

        // Crear contenidos ficticios en la tabla
        for($i = 0; $i < 30; $i++)
        {
            Contenido::create([
                'Descripcion'=> $faker->paragraph,
            ]);
        }
    }
}
