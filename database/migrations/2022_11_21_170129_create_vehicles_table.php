<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->comment('اسم المدرسة');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->unsignedBigInteger('vehicle_category_id')->comment('تصنيف المركبة');
            $table->foreign('vehicle_category_id')->references('id')->on('vehicle_categories');
            $table->integer('vehicle_no')->comment('رقم المركبة');
            $table->integer('v_production_date')->comment('سنة الصنع ');
            $table->string('v_color')->comment(' لون المركبة');
            $table->string('v_type')->comment(' نوع المركبة');
            $table->unsignedBigInteger('v_insurance_type_id')->comment('نوع التأمين ');
            $table->foreign('v_insurance_type_id')->references('id')->on('v_insurance_types');
            $table->date('v_insurance_expired_date')->comment('تاريخ انتهاء التأمين');
            $table->date('v_license_expired_date')->comment('تاريخ انتهاء الترخيص');
            $table->text('v_notes')->nullable()->comment('ملاحظات ');
            $table->softDeletes();
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
        Schema::dropIfExists('vehicles');
    }
}
