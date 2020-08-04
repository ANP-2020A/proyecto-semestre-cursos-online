<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courses', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
        Schema::table('registers', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('restrict');
        });
        Schema::table('levels', function (Blueprint $table) {
            $table->unsignedBigInteger('course_id');
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('restrict');
        });
        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('restrict');
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('restrict');
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id');
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('restrict');
        });
        Schema::table('select_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('answer_id');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('restrict');
            $table->unsignedBigInteger('record_id');
            $table->foreign('record_id')->references('id')->on('records')->onDelete('restrict');
        });
        Schema::table('records', function (Blueprint $table) {
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('restrict');
            $table->unsignedBigInteger('register_id');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('restrict');
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('register_id');
            $table->foreign('register_id')->references('id')->on('registers')->onDelete('restrict');
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

        Schema::dropIfExists('registers');
        Schema::dropIfExists('certificates');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('levels');
        Schema::dropIfExists('contents');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('select_answers');
        Schema::dropIfExists('records');

        Schema::table('courses', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });
        Schema::table('levels', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
        });
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['level_id']);
        });
        Schema::table('answers', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
        });
        Schema::table('certificates', function (Blueprint $table) {
            $table->dropForeign(['register_id']);
        });
        Schema::enableForeignKeyConstraints();
    }
}
