<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VInsuranceType extends Model
{
    use HasFactory;
    protected $fillable = [
        'v_insurance_type',
    ];

    public function vehicles(){
        return $this->hasMany(Vehicle::class);
    }
}
