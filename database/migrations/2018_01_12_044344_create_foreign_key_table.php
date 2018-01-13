<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
//        Schema::table('coursee', function($table) {
//            $table->foreign('course_id')->references('course_id')->on('courses');
//            $table->foreign('session_id')->references('session_id')->on('sessions');

//        });
        Schema::table('courseOffer', function($table) {
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('session_id')->references('session_id')->on('sessions');

        });
        Schema::table('mark', function($table) {
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('offer_id')->references('offer_id')->on('courseOffer');
        });
        Schema::table('teacherAssignments', function($table) {
            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
            $table->foreign('offer_id')->references('offer_id')->on('courseOffer');

        });
        Schema::table('enrollment', function($table) {
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('offer_id')->references('offer_id')->on('courseOffer');
        });
        Schema::table('coursesExamType', function($table) {
            $table->foreign('course_id')->references('course_id')->on('courses');
            $table->foreign('exam_id')->references('exam_id')->on('examtype');
        });

//        Schema::table('demo', function ($table) {
//            $table->foreign('exam_id')->references('exam_id')->on('examtype');
//        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
