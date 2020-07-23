<?php

use App\Historial;
use Illuminate\Database\Seeder;

class HistorialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Historial::truncate();
        $faker = \Faker\Factory::create();

        // Crear Historiales ficticios en la tabla
        for($i = 0; $i < 20; $i++)
        {
            Historial::create([
                'FechaHistorial'=> $faker->date('Y-m-d','now'),
                'Calificacion'=> $faker->numberBetween(1,10),
                'Comentario'=> $faker->paragraph,
            ]);
        }
    }
}
