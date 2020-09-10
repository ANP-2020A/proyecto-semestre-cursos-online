<?php

use App\Course;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla articles.
        Course::truncate();
        $faker = \Faker\Factory::create();

        // Obtenemos la lista de todos los usuarios creados e
        // iteramos sobre cada uno y simulamos un inicio de
        // sesión con cada uno para crear artículos en su nombre
        $users = App\User::all();

        foreach ($users as $user) {
            // iniciamos sesión con este usuario
            JWTAuth::attempt(['email' => $user->email, 'password' => '123123', 'type' => $user->type]);

            // Y ahora con este usuario creamos algunos articulos
            $num_courses = 3;

            for ($j = 0; $j < $num_courses; $j++) {
                if($user->type=='admin'){
                    Course::create([
                        'name' => $faker->sentence,
                        'description' => $faker->paragraph,
                        'type' => $faker->word,
                        'date_start' => $faker->date('Y-m-d','now'),
                        'num_level' => 5,
                        'image' => $faker->imageUrl(400,300, null, false)
                    ]);
                }
            }
        }
    }
}
