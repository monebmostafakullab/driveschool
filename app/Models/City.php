<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_id',
        'city_name',
    ];

    public function Region(){
        return $this->belongsTo(Region::class);
    }

    public function students(){
        return $this->hasMany(Student::class);
    }
}
