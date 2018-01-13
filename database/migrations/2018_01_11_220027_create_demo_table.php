<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('exam_id');
            $table->timestamps();
        });

//        Schema::disableForeignKeyConstraints();
//
//        Schema::table('demo', function ($table) {
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
        Schema::drop('demo');
    }
}
