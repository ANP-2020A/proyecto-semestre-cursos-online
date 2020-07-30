<?php

use App\Certificate;
use Illuminate\Database\Seeder;

class CertificatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Certificate::truncate();
        $faker = \Faker\Factory::create();


        // Crear niveles ficticios en la tabla
        $num_registros = 15;


           for($i = 1; $i < $num_registros; $i++){

                Certificate::create([
                    'Descrip_cert' => $faker->paragraph,
                    'registro_id' => $i,
                ]);
            }

    }
}
