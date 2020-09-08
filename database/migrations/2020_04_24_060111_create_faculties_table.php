<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->bigIncrements('faculty_id');
            $table->integer('admin_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('designation');
            $table->string('password');
            $table->integer('department_id')->unsigned();
            $table->string('image');
            $table->rememberToken();

            $table->unique('email');
            $table->foreign('admin_id')->references('admin_id')->on('admins');
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade');
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
        Schema::dropIfExists('faculties');
    }
}
