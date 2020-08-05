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
        $num_register = 1;
        $register1 = \App\Register::all();

        foreach ($register1 as $register) {
            if($num_register==16){
                break;
            }
            Certificate::create([
                'description' => $faker->sentence,
                'register_id'=> $num_register,
            ]);
            $num_register++;
        }
    }
}
