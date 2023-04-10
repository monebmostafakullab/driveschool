<?php

namespace App\Http\Requests;

use App\Models\EmplCategory;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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

    public function rules()
    {
        if(isset($this->empl_category)){
            $emplcategory = EmplCategory::find($this->empl_category);
            $emplcategorytype = $emplcategory->type;
        }

        if(isset($emplcategorytype) && $emplcategorytype == 0){
            return [
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
                'empl_category'=>'required',
                'assignment_date' => 'required',
                'sallary' => 'required',
             ];
        }else{
            return [
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
                'empl_category'=>'required',
                'assignment_date' => 'required',
                'sallary' => 'required',
                'license_no' => 'required',
                'license_grade' => 'required',
                'license_expired_date' => 'required',
                't_license_no' => 'required',
                't_license_grade' => 'required',
                't_license_expired_date' => 'required',
             ];
        }
    }

}
