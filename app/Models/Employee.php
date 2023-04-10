<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'school_id',
        'app_date',
        'idno',
        'fname',
        'sname',
        'thname',
        'lname',
        'fullname',
        'idno',
        'DOB',
        'gender_id',
        'mobile1',
        'mobile2',
        'email',
        'city_id',
        'address',
        'empl_category_id',
        'assignment_date',
        'sallary',
        'notes',
        'license_no',
        'license_grade_id',
        'license_expired_date',
        't_license_no',
        't_license_grade_id',
        't_license_expired_date',
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function empl_category(){
        return $this->belongsTo(EmplCategory::class);
    }

    public function license_grade(){
        return $this->belongsTo(Grade::class,'license_grade_id');
    }

    public function t_license_grade(){
        return $this->belongsTo(Grade::class,'t_license_grade_id');
    }

    public function training_types()
    {
        return $this->belongsToMany(TrainingType::class,'employee_training_type','emp_id','training_type_id');
    }
}
