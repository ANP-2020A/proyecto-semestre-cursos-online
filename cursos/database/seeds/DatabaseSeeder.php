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
        Schema::disableForeignKeyConstraints();


        $this->call(CursosTableSeeder::class);
        $this->call(NivelsTableSeeder::class);
        $this->call(ContenidosTableSeeder::class);
        $this->call(PreguntasTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RegistrosTableSeeder::class);
        $this->call(CertificatesTableSeeder::class);
        /*
        $this->call(HistorialsTableSeeder::class);
        $this->call(SelectAnswersTableSeeder::class);*/
        Schema::enableForeignKeyConstraints();
    }

}
