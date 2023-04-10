<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'school_id',
        'app_date',
        'idno',
        'fname',
        'sname',
        'thname',
        'lname',
        'fullname',
        'license_type_id',
        'check_type_id',
        'DOB',
        'gender_id',
        'mobile1',
        'mobile2',
        'email',
        'city_id',
        'address',
        'sign_check_type_id',
        'contract_type_id',
        'cost',
        'payment',
        'notes',
    ];
    public function school(){
        return $this->belongsTo(School::class);
    }
    
    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

    public function license_type(){
        return $this->belongsTo(License_type::class);
    }

    public function check_type(){
        return $this->belongsTo(Check_type::class);
    }

    public function sign_check_type(){
        return $this->belongsTo(Sign_check_type::class);
    }

    public function contract_type(){
        return $this->belongsTo(Contract_type::class);
    }

    public function student_status(){
        return $this->belongsTo(Student_status::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }

    public function activeLessons(){
        return $this->lessons()->where('status',1)->count();
    }


}
