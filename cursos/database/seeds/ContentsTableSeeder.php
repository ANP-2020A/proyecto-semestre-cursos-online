<?php

use App\Content;
use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Content::truncate();
        $faker = \Faker\Factory::create();

        // Crear niveles ficticios en la tabla
        $num_content = 5;
        $num_level=1;
        $level1 = \App\Level::all();

        foreach ($level1 as $level) {
            for($i = 1; $i < $num_content; $i++){
                Content::create([
                    'description' => $faker->sentence,
                    'level_id'=>$num_level,
                ]);
                if ($i==4){
                    $num_level++;
                }
            }
        }
    }
}
