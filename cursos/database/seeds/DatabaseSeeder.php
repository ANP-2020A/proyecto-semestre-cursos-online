<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(UsersTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(CertificatesTableSeeder::class);
        $this->call(ContenidosTableSeeder::class);
        $this->call(CursosTableSeeder::class);
        $this->call(HistorialsTableSeeder::class);
        $this->call(NivelsTableSeeder::class);
        $this->call(PreguntasTableSeeder::class);
        $this->call(RegistrosTableSeeder::class);
        $this->call(SelectAnswersTableSeeder::class);
    }

}
