<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseOffer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseOffer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('offer_id')->unique();
            $table->string('course_id');
            $table->string('session_id');
            $table->integer('ct_no');
            $table->integer('best_ct_no');
            $table->integer('online_no');
            $table->integer('best_online_no');
            $table->integer('offline_no');
            $table->integer('best_offline_no');
            $table->integer('lab_performance_no');
            $table->integer('best_lab_performance_no');
            $table->integer('viva_no');
            $table->integer('best_viva_no');
            $table->integer('project');
            $table->integer('quiz');
            $table->timestamps();
        });

//        Schema::disableForeignKeyConstraints();
//        Schema::table('courseOffer', function($table) {
//            $table->foreign('course_id')->references('course_id')->on('courses');
//            $table->foreign('session_id')->references('session_id')->on('sessions');
//
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
        Schema::drop('courseOffer');
    }
}
