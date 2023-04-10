<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    protected $fillable = [
        'region_name',
    ];

    public function schools()
    {
        return $this->hasMany(School::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
