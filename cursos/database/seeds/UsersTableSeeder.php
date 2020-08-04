<?php

use App\Course;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Vaciar la tabla.
        User::truncate();

        $faker = \Faker\Factory::create();

        // Crear la misma clave para todos los usuarios
        // conviene hacerlo antes del for para que el seeder
        // no se vuelva lento.
        $password = Hash::make('123123');

        User::create([
                'name'=> 'Administrador',
                'last_name'=> 'Admi',
                'email'=> 'admin@prueba.com',
                'type'=> 'admin',
                'password'=> $password,]
        );

        // Generar algunos usuarios para nuestra aplicacion
        for($i = 0; $i < 6; $i++) {
            $user = User::create([
                'name'=> $faker->name,
                'last_name'=> $faker->lastName,
                'email'=> $faker->email,
                'type'=> 'admin',
                'password'=> $password,
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            $user = User::create([
                'name'=> $faker->name,
                'last_name'=> $faker->lastName,
                'email'=> $faker->email,
                'type'=> 'student',
                'password'=> $password,
            ]);
        }
    }
}
