<?php

use App\Register;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegistersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Register::truncate();
        $faker = \Faker\Factory::create();

        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear registros en su nombre
        $users = App\User::all();

        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123', 'type' => $user->type]);

            // Y ahora con este usuario creamos algunos registros a cursos
            $num_courses = 3;

            for ($j = 0; $j < $num_courses; $j++) {
                if($user->type=='student'){
                    Register::create([
                        'progress' => $faker->numberBetween(1,100),
                        'score' => $faker->numberBetween(1,20),
                        'course_id' => $faker->numberBetween(1,21)
                    ]);
                }
            }
        }
    }
}
