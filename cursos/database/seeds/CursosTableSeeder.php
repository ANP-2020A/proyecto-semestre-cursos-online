<?php

use App\Cursos;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class CursosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Cursos::truncate();
        $faker = \Faker\Factory::create();

        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear artículos en su nombre
        $users = App\User::all();

        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123', 'tipo' => $user->tipo]);

            // Y ahora con este usuario creamos algunos articulos
            $num_cursos = 3;

            for ($j = 0; $j < $num_cursos; $j++) {
                if($user->tipo=='administrador'){
                    Cursos::create([
                        'Nombre' => $faker->sentence,
                        'Descripcion' => $faker->paragraph,
                        'Tipo' => $faker->word,
                        'FechaInicio' => $faker->date('Y-m-d','now'),
                        'Niveles' => 5,
                    ]);
                }
            }
        }
    }
}
