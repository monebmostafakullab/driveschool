<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_id',
        'student_id',
        'vehicle_id',
        'lesson_date',
        'lesson_time',
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function scopeActive($query) {
        return $query->where('status', true);
    }
}
