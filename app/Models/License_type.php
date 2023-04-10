<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License_type extends Model
{
    use HasFactory;
    protected $fillable = [
        'license_name',
    ];

    public function students(){
        return $this->hasMany(Student::class);
    }
}
