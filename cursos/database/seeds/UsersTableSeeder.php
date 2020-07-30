<?php

use App\Cursos;
use App\User;
use App\Category;
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
                'nombre'=> 'Administrador',
                'apellido'=> 'Admi',
                'email'=> 'admin@prueba.com',
                'tipo'=> 'administrador',
                'password'=> $password,]
        );

        // Generar algunos usuarios para nuestra aplicacion
        for($i = 0; $i < 6; $i++) {
            $user = User::create([
                'nombre'=> $faker->name,
                'apellido'=> $faker->lastName,
                'email'=> $faker->email,
                'tipo'=> 'administrador',
                'password'=> $password,
            ]);
        }

        for($i = 0; $i < 10; $i++) {
            $user = User::create([
                'nombre'=> $faker->name,
                'apellido'=> $faker->lastName,
                'email'=> $faker->email,
                'tipo'=> 'estudiante',
                'password'=> $password,
            ]);
        }
    }
}
