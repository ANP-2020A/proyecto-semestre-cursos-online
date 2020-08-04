<?php

use App\Level;
use Illuminate\Database\Seeder;
use Tymon\JWTAuth\Facades\JWTAuth;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Level::truncate();
        $faker = \Faker\Factory::create();

        // Crear niveles ficticios en la tabla
        $num_level = 6;
        $course1 = \App\Course::all();
        $num_course = 1;
        foreach ($course1 as $course) {
            for($i = 1; $i < $num_level; $i++){
                Level::create([
                    'title' => $faker->sentence,
                    'number' => $i,
                    'description' => $faker->paragraph,
                    'course_id'=>$num_course
                ]);
                if ($i==5){
                    $num_course++;
                }
            }

        }
    }
}
