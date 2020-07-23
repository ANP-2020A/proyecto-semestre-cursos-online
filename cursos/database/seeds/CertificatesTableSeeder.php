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
        // Vaciar la tabla.
        Certificate::truncate();
        $faker = \Faker\Factory::create();
        // Crear certificados  en la tabla
        for ($i = 0; $i < 40; $i++) {
            Certificate::create([
                'Descrip_cert' => $faker->text(200),
            ]);
        }
    }
}
