<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_status extends Model
{
    use HasFactory;
    protected $table = 'student_status';
    protected $fillable = [
        'st_status_name',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
