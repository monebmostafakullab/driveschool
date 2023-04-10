<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->comment('اسم المدرسة');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->unsignedBigInteger('student_id')->comment('اسم الطالب');
            $table->foreign('student_id')->references('id')->on('students');
            $table->unsignedBigInteger('vehicle_id')->comment('رقم المركبة ');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->date('lesson_date')->comment('اليوم والتاريخ');
            $table->integer('lesson_time')->comment('وقت الدرس');
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
        Schema::dropIfExists('lessons');
    }
}
