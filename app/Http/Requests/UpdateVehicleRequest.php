<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVehicleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'vehicle_category_id' => 'required',
            'vehicle_no'=> 'required',
            'v_production_date' => 'required',
            'v_color' => 'required',
            'v_type' => 'required',
            'v_insurance_type_id' => 'required',
            'v_insurance_expired_date' => 'required|date',
            'v_license_expired_date'  => 'required|date',
        ];
    }
}
