<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'school_id',
        'vehicle_category_id',
        'vehicle_no',
        'v_production_date',
        'v_color',
        'v_type',
        'v_insurance_type_id',
        'v_insurance_expired_date',
        'v_license_expired_date',
        'v_notes',
    ];

    public function school(){
        return $this->belongsTo(School::class);
    }

    public function vehicle_category(){
        return $this->belongsTo(VehicleCategory::class);
    }

    public function v_insurance_type(){
        return $this->belongsTo(VInsuranceType::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
