<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTrainingTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_training_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id')->comment('الموظف');
            $table->foreign('emp_id')->references('id')->on('employees');
            $table->unsignedBigInteger('training_type_id')->comment('نوع التدريب');
            $table->foreign('training_type_id')->references('id')->on('training_types');
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
        Schema::dropIfExists('employee_training_type');
    }
}
