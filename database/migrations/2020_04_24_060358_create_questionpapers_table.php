<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionpapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionpapers', function (Blueprint $table) {
            $table->bigIncrements('questionpaper_id');
            $table->integer('faculty_id')->unsigned();
            // $table->integer('course_id')->unsigned();
            $table->integer('subject_id')->unsigned();
            $table->string('date');
            $table->integer('mark_per_module');
            $table->string('exam_code');
            // $table->integer('question_id')->unsigned();
            $table->string('difficulty_level');
            $table->integer('no_of_module');
            $table->integer('question_per_module');
            $table->integer('time_of_exam');
            $table->integer('options');

            $table->foreign('faculty_id')->references('faculty_id')->on('faculties')->onDelete('cascade');
            $table->foreign('subject_id')->references('subject_id')->on('subjects')->onDelete('cascade');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionpapers');
    }
}
