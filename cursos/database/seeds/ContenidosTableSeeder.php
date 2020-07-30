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

        // Crear niveles ficticios en la tabla
        $num_contenido = 5;
        $num_nivel=1;
        $nivel1 = \App\Nivel::all();

        foreach ($nivel1 as $nivel) {
                for($i = 1; $i < $num_contenido; $i++){
                    Contenido::create([
                        'Descripcion' => $faker->sentence,
                        'nivel_id'=>$num_nivel,
                    ]);
                    if ($i==4){
                        $num_nivel++;
                    }
                }
        }
    }
}
