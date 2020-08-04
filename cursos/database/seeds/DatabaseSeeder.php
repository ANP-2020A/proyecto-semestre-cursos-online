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

        $this->call(UsersTableSeeder::class);
        $this->call(RegistersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(ContentsTableSeeder::class);
        $this->call(QuestionsTableSeeder::class);
        $this->call(AnswersTableSeeder::class);
        $this->call(RecordsTableSeeder::class);
        $this->call(SelectAnswersTableSeeder::class);
        $this->call(CertificatesTableSeeder::class);

        Schema::enableForeignKeyConstraints();
    }

}
