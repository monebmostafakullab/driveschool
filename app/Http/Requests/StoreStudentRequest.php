<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
           'app_date' => 'required|date',
           'fname' => 'required',
           'sname' => 'required',
           'thname' => 'required',
           'lname' => 'required',
           'idno' => 'required',
           'DOB' => 'required',
           'gender' => 'required',
           'mobile1' => 'required',
           'email' => 'nullable|email',
           'city' => 'required',
           'address' => 'required',
           'license_type' => 'required',
           'contract_type' => 'required',
           'cost' => 'required',
           'check_type' => 'required',
           'sign_check_type' => 'required',
        ];
    }
}
