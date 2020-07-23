<?php

use App\Registro;
use Illuminate\Database\Seeder;

class RegistrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Registro::truncate();

        $faker = \Faker\Factory::create();

        // Crear productos ficticios en la tabla
        for($i = 0; $i < 30; $i++) {
            Registro::create([
                'avance' => $faker->numberBetween(1,100),
                'calificacion' => $faker->numberBetween(1,20),
            ]);
        }
    }
}
