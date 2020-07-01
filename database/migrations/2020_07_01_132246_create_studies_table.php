<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('periode_id')->unsigned();
            $table->integer('course_id')->unsigned();
            $table->float('grade');
            $table->timestamps();

            $table->foreign('user_id', 'periode_id', 'course_id')->references('id')->on('users', 'periodes', 'courses')
                  ->onUpdate('cascade','cascade','cascade')->onDelete('cascade','cascade','cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('studies');
    }
}
