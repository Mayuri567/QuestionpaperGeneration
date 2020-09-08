<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpdatequestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('updatequestions', function (Blueprint $table) {
            $table->integer('question_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->string('old_question');
            $table->string('new_question');
            $table->string('time_of_update');

            $table->foreign('question_id')->references('question_id')->on('questions')->onDelete('cascade');
            $table->foreign('faculty_id')->references('faculty_id')->on('faculties')->onDelete('cascade');
            
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
        Schema::dropIfExists('updatequestions');
    }
}
