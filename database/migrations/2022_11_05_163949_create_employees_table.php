<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->comment('اسم المدرسة');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->string('fname')->comment('الاسم الأول');
            $table->string('sname')->comment('الاسم الثاني');
            $table->string('thname')->comment('الاسم الثالث');
            $table->string('lname')->comment('الاسم الاخير');
            $table->string('fullname')->comment('الاسم الكامل');
            $table->integer('idno')->comment('رقم الهوية');
            $table->date('DOB')->comments('تاريخ الميلاد');
            $table->unsignedBigInteger('gender_id')->comment('الجنس - ذكر - أنثى ');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->string('mobile1')->comment('رقم الجوال 1');
            $table->string('mobile2')->nullable(true)->comment('رقم الجوال 2');
            $table->string('email')->nullable(true)->comment('البريد الالكتروني');
            $table->unsignedBigInteger('city_id')->comment('المدينة');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('address')->comment('العنوان');
            $table->unsignedBigInteger('empl_category_id')->comment('نوع التصنيف -مدرب - مدرب مهني - مراسل - الخ ');
            $table->foreign('empl_category_id')->references('id')->on('empl_categories');
            $table->date('assignment_date')->comments('تاريخ التعيين');
            $table->integer('sallary')->comment('الراتب');
            $table->text('notes')->nullable()->comment('ملاحظات');
            $table->integer('license_no')->nullable()->comment('رقم رخصة القيادة');
            $table->unsignedBigInteger('license_grade_id')->nullable()->comment('درجة رخصة القيادة - 1 - 2 - 3 - 10');
            $table->foreign('license_grade_id')->references('id')->on('grades');
            $table->date('license_expired_date')->nullable()->comments('تاريخ انتهاء رخصة القيادة');
            $table->integer('t_license_no')->nullable()->comment('رقم رخصة التدريب');
            $table->unsignedBigInteger('t_license_grade_id')->nullable()->comment('درجة رخصة التدريب - 1 - 2 - 3 - 10');
            $table->foreign('t_license_grade_id')->references('id')->on('grades');
            $table->date('t_license_expired_date')->nullable()->comments('تاريخ انتهاء رخصة التدريب');
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
        Schema::dropIfExists('employees');
    }
}
