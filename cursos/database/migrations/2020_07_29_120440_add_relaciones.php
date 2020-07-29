<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cursos', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
        Schema::table('registros', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('restrict');
        });
        Schema::table('nivels', function (Blueprint $table) {
            $table->unsignedBigInteger('curso_id');
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('restrict');
        });
        Schema::table('contenidos', function (Blueprint $table) {
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('nivels')->onDelete('restrict');
        });
        Schema::table('preguntas', function (Blueprint $table) {
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('nivels')->onDelete('restrict');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id')->on('preguntas')->onDelete('restrict');
        });
        Schema::table('select_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('restrict');
            $table->unsignedBigInteger('historial_id');
            $table->foreign('historial_id')->references('id')->on('historials')->onDelete('restrict');
        });
        Schema::table('historials', function (Blueprint $table) {
            $table->unsignedBigInteger('nivel_id');
            $table->foreign('nivel_id')->references('id')->on('nivels')->onDelete('restrict');
            $table->unsignedBigInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('restrict');
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('registro_id');
            $table->foreign('registro_id')->references('id')->on('registros')->onDelete('restrict');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();

        Schema::dropIfExists('registros');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('cursos');
        Schema::dropIfExists('nivels');
        Schema::dropIfExists('contenidos');
        Schema::dropIfExists('preguntas');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('select_answers');
        Schema::dropIfExists('historials');

        Schema::table('cursos', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('nivels', function (Blueprint $table) {
            $table->dropForeign(['curso_id']);
        });
        Schema::table('contenidos', function (Blueprint $table) {
            $table->dropForeign(['nivel_id']);
        });
        Schema::table('preguntas', function (Blueprint $table) {
            $table->dropForeign(['nivel_id']);
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['pregunta_id']);
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['registro_id']);
        });
        Schema::enableForeignKeyConstraints();
    }
}
