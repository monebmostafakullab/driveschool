<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = [
        'school_name',
        'region_id',
        'manager_name',
        'manegar_mobile',
        'contact_person',
        'contact_mobile',
    ];

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
