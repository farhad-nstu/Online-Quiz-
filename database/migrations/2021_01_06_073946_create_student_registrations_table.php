<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_registrations', function (Blueprint $table) {

            $table->id();
            $table->string('school');
            $table->string('class');
            $table->string('roll');
            $table->string('name');
            $table->string('user_name');
            $table->string('password');
            $table->string('parent_phone');
            $table->string('positive_score')->nullable();
            $table->string('negative_score')->nullable();
            $table->string('total_score')->nullable();
            $table->tinyInteger('is_exam')->default('0');
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
        Schema::dropIfExists('student_registrations');
    }
}
