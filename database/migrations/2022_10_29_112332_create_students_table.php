<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('school_id')->comment('اسم المدرسة');
            $table->foreign('school_id')->references('id')->on('schools');
            $table->date('app_date')->comment('تاريخ الطلب');
            $table->integer('idno')->comment('رقم الهوية');
            $table->string('fname')->comment('الاسم الأول');
            $table->string('sname')->comment('الاسم الثاني');
            $table->string('thname')->comment('الاسم الثالث');
            $table->string('lname')->comment('الاسم الاخير');
            $table->string('fullname')->comment('الاسم الكامل');
            $table->unsignedBigInteger('license_type_id')->comment('نوع الرخصة -ملاكي - تجاري - الخ ');
            $table->foreign('license_type_id')->references('id')->on('license_types');
            $table->unsignedBigInteger('check_type_id')->comment('نوع الفحص - عادي -سيطرة - الخ ');
            $table->foreign('check_type_id')->references('id')->on('check_types');
            $table->date('DOB')->comments('تاريخ الميلاد');
            $table->unsignedBigInteger('gender_id')->comment('الجنس - ذكر - أنثى ');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->string('mobile1')->comment('رقم الجوال 1');
            $table->string('mobile2')->nullable(true)->comment('رقم الجوال 2');
            $table->string('email')->nullable(true)->comment('البريد الالكتروني');
            $table->unsignedBigInteger('city_id')->comment('المدينة');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('address')->comment('العنوان');
            $table->unsignedBigInteger('sign_check_type_id')->comment('نوع فحص الاشارة - شفوي - تحريري ');
            $table->foreign('sign_check_type_id')->references('id')->on('sign_check_types');
            $table->unsignedBigInteger('contract_type_id')->comment('نوع الاتفاقية - دروس - مقاولة ');
            $table->foreign('contract_type_id')->references('id')->on('contract_types');
            $table->unsignedBigInteger('student_status_id')->default(1)->comment('حالة الطالب - طالب جديد فعال - تحت التدريب');
            $table->foreign('student_status_id')->references('id')->on('student_status');
            $table->integer('cost')->comment('التكلفة');
            $table->integer('payment')->default(0)->comment('المبلغ المدفوع');
            $table->text('notes')->nullable()->comment('ملاحظات');
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
        Schema::dropIfExists('students');
    }
}
