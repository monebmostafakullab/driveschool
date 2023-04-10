<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmplCategory extends Model
{
    use HasFactory;
    protected $table = 'empl_categories';
    protected $fillable = ['category_name','type'];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
