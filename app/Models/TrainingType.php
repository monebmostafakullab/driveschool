<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingType extends Model
{
    use HasFactory;
    protected $table = 'training_types';
    public function employees()
    {
        return $this->belongsToMany(Employee::class,'employee_training_type','training_type_id','emp_id');
    }
}
