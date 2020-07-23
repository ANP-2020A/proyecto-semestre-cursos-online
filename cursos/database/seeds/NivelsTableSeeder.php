<?php

use App\Nivel;
use Illuminate\Database\Seeder;

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
        for($i = 0; $i < 6; $i++)
        {
            Nivel::create([
                'Titulo'=> $faker->sentence,
                'Numero'=> $faker->numberBetween(1,6),
                'Descripcion'=> $faker->paragraph,
            ]);
        }
    }
}
