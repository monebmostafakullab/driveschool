<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Models\City;
use App\Models\EmplCategory;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Grade;
use App\Models\TrainingType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::get();
        return view('employees.index',compact('employees'));
    }
    public function create()
    {
        $genders = Gender::get();
        $cities = City::get();
        $empl_categories = EmplCategory::get();
        $grades = Grade::get();
        $training_types = TrainingType::get();
        return view('employees.create',compact('genders','cities','empl_categories','grades','training_types'));
    }
    public function store(StoreEmployeeRequest $request)
    {

        try{
            $data = [
                'school_id' => 1,
                'fname'=>$request->fname,
                'sname'=>$request->sname,
                'thname'=>$request->thname,
                'lname'=>$request->lname,
                'fullname'=>$request->fname.' '.$request->sname.' '.$request->thname.' '.$request->lname,
                'idno' => $request->idno,
                'DOB'=>$request->DOB,
                'gender_id'=>$request->gender,
                'mobile1'=>$request->mobile1,
                'mobile2'=>$request->mobile2,
                'email'=>$request->email,
                'city_id'=>$request->city,
                'address'=>$request->address,
                'empl_category_id'=>$request->empl_category,
                'assignment_date'=>$request->assignment_date,
                'sallary'=>$request->sallary,
                'notes'=>$request->notes,
                'license_no'=>$request->license_no,
                'license_grade_id'=>$request->license_grade,
                'license_expired_date'=>$request->license_expired_date,
                't_license_no'=>$request->t_license_no,
                't_license_grade_id'=>$request->t_license_grade,
                't_license_expired_date'=>$request->t_license_expired_date,
            ];
            $employee = Employee::create($data);
            $employee->training_types()->attach($request->training_types);
            notify()->success('تم اضافة الموظف بنجاح' ,'');
            return redirect()->route('employees.index');
        }catch(\Exception $ex){
            notify()->error($ex->getMessage(),'');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Employee $employee)
    {
        $genders = Gender::get();
        $cities = City::get();
        $empl_categories = EmplCategory::get();
        $grades = Grade::get();
        $employee_category_type = $employee->empl_category->type;
        $training_types = TrainingType::get();
        $employee_training_types = $employee->training_types()->get();
        $employee_training_type_ids = [];
        foreach($employee_training_types as $index => $employee_training_type){
            $employee_training_type_ids[] = $employee->training_types()->get()[$index]->id;
        }
        return view('employees.edit',compact('employee','genders','cities','empl_categories','grades','training_types','employee_training_type_ids','employee_category_type'));
    }

    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        try{
            $data = [
                'school_id' => 1,
                'fname'=>$request->fname,
                'sname'=>$request->sname,
                'thname'=>$request->thname,
                'lname'=>$request->lname,
                'fullname'=>$request->fname.' '.$request->sname.' '.$request->thname.' '.$request->lname,
                'idno' => $request->idno,
                'DOB'=>$request->DOB,
                'gender_id'=>$request->gender,
                'mobile1'=>$request->mobile1,
                'mobile2'=>$request->mobile2,
                'email'=>$request->email,
                'city_id'=>$request->city,
                'address'=>$request->address,
                'empl_category_id'=>$request->empl_category,
                'assignment_date'=>$request->assignment_date,
                'sallary'=>$request->sallary,
                'notes'=>$request->notes,
                'license_no'=>$request->license_no,
                'license_grade_id'=>$request->license_grade,
                'license_expired_date'=>$request->license_expired_date,
                't_license_no'=>$request->t_license_no,
                't_license_grade_id'=>$request->t_license_grade,
                't_license_expired_date'=>$request->t_license_expired_date,
            ];
            $employee->update($data);
            $employee->training_types()->sync($request->training_types);
            notify()->success('تم تعديل الموظف بنجاح' ,'');
            return redirect()->route('employees.index');
        }catch(\Exception $ex){
            notify()->error('هناك خطأ ما','');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }

    public function destroy(Employee $employee)
    {
        try{
            // $employee->training_types()->detach();
            $employee->delete();
            notify()->success('تم حذف الموظف بنجاح' ,'');
            return redirect()->route('employees.index');
        }catch(\Exception $ex){
            notify()->error('هناك خطأ ما','');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }
}
