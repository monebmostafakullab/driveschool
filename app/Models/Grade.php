<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    public function license_grade_employees(){
        return $this->hasMany(Employee::class,'license_grade_id');
    }
    public function t_license_grade_employees(){
        return $this->hasMany(Employee::class,'t_license_grade_id');
    }
}
