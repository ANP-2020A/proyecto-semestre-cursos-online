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
        $num_register = 16;
        $register1 = \App\Register::all();

            for($i = 1; $i < $num_register; $i++){
                Certificate::create([
                    'description' => $faker->sentence,
                    'register_id'=> $i,
                ]);
            }
    }
}
