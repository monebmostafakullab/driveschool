<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sign_check_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'sign_check_name',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
