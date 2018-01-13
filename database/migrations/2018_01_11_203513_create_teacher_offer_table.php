<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacherAssignments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teacher_id')->unsigned();
            $table->string('offer_id');
            $table->timestamps();
        });
//        Schema::disableForeignKeyConstraints();
//        Schema::table('teacherAssignments', function($table) {
//            $table->foreign('teacher_id')->references('teacher_id')->on('teachers');
//            $table->foreign('offer_id')->references('offer_id')->on('courseOffer');
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
        Schema::drop('teacherAssignments');
    }
}
