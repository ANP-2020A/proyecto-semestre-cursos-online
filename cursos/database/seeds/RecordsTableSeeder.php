<?php

use App\Record;
use Illuminate\Database\Seeder;

class RecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Vaciar la tabla.
        Record::truncate();
        $faker = \Faker\Factory::create();

        // Crear Historiales ficticios en la tabla
        $num_register=1;
        $register1= \App\Register::all();


        foreach ($register1 as $register) {
            if ($num_register==6){
                break;
            }
            for($i = 0; $i < 5; $i++)
            {
                Record::create([
                    'date_record'=> $faker->date('Y-m-d','now'),
                    'score'=> $faker->numberBetween(1,10),
                    'comment'=> $faker->paragraph,
                    'register_id' => $num_register,
                    'level_id' => $i+1,
                ]);
            }
            $num_register++;
        }
    }
}
