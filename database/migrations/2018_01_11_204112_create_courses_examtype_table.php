<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesExamtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesExamType', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_id');
            $table->integer('exam_id')->unsigned();
            $table->timestamps();
        });

//        Schema::disableForeignKeyConstraints();
//        Schema::table('coursesExamType', function($table) {
//            $table->foreign('course_id')->references('course_id')->on('courses');
//            $table->foreign('exam_id')->references('exam_id')->on('examtype');
//        });
//        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coursesExamType');
    }
}
