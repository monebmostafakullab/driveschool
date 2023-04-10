<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
                $table->id();
                $table->string('school_name')->comment('اسم المدرسة');
                $table->unsignedBigInteger('region_id')->comment('المنطقة');
                $table->foreign('region_id')->references('id')->on('regions');
                $table->string('manager_name')->comment('اسم المدير');
                $table->integer('manager_mobile')->comment('رقم جوال المدير');
                $table->string('contact_person')->comment('مسئول التواصل');
                $table->integer('contact_mobile')->comment('رقم مسئول التواصل');
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
        Schema::dropIfExists('schools');
    }
}
