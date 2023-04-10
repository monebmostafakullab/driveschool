<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Check_type;
use App\Models\City;
use App\Models\Contract_type;
use App\Models\Gender;
use App\Models\Lesson;
use App\Models\License_type;
use App\Models\Region;
use App\Models\Sign_check_type;
use App\Models\Student;
use App\Models\Vehicle;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::get();
        return view('students.index',compact('students'));
    }

    public function create()
    {
        $genders = Gender::get();
        $cities = City::get();
        $license_types = License_type::get();
        $contract_types = Contract_type::get();
        $check_types = Check_type::get();
        $sign_check_types = Sign_check_type::get();
        return view('students.create',compact(['genders','cities','license_types','contract_types','check_types','sign_check_types']));
    }

    public function store(StoreStudentRequest $request)
    {
        try{
            $data = [
                'school_id' => 1,
                'app_date' => $request->app_date,
                'idno' => $request->idno,
                'fname'=>$request->fname,
                'sname'=>$request->sname,
                'thname'=>$request->thname,
                'lname'=>$request->lname,
                'fullname'=>$request->fname.' '.$request->sname.' '.$request->thname.' '.$request->lname,
                'license_type_id' =>$request->license_type,
                'check_type_id' =>$request->check_type,
                'DOB'=>$request->DOB,
                'gender_id'=>$request->gender,
                'mobile1'=>$request->mobile1,
                'mobile2'=>$request->mobile2,
                'email'=>$request->email,
                'city_id'=>$request->city,
                'address'=>$request->address,
                'student_status_id'=>1,
                'sign_check_type_id'=>$request->sign_check_type,
                'contract_type_id'=>$request->contract_type,
                'cost'=>$request->cost,
                'payment'=>0,
                'notes'=>$request->notes,
            ];
            Student::create($data);
            notify()->success('تم اضافة الطالب بنجاح' ,'');
            return redirect()->route('students.index');
        }catch(\Exception $ex){
            notify()->error($ex->getMessage(),'');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }

    }

    public function show($id)
    {
        //
    }

    public function edit(Student $student)
    {
        $genders = Gender::get();
        $cities = City::get();
        $license_types = License_type::get();
        $contract_types = Contract_type::get();
        $check_types = Check_type::get();
        $sign_check_types = Sign_check_type::get();
        return view('students.edit',compact(['student','genders','cities','license_types','contract_types','check_types','sign_check_types']));
    }
    public function update(UpdateStudentRequest $request, Student $student)
    {
        try{
            $data = [
                'school_id' => 1,
                'app_date' => $request->app_date,
                'idno' => $request->idno,
                'fname'=>$request->fname,
                'sname'=>$request->sname,
                'thname'=>$request->thname,
                'lname'=>$request->lname,
                'fullname'=>$request->fname.' '.$request->sname.' '.$request->thname.' '.$request->lname,
                'license_type_id' =>$request->license_type,
                'check_type_id' =>$request->check_type,
                'DOB'=>$request->DOB,
                'gender_id'=>$request->gender,
                'mobile1'=>$request->mobile1,
                'mobile2'=>$request->mobile2,
                'email'=>$request->email,
                'city_id'=>$request->city,
                'address'=>$request->address,
                'student_status_id'=>1,
                'sign_check_type_id'=>$request->sign_check_type,
                'contract_type_id'=>$request->contract_type,
                'cost'=>$request->cost,
                'payment'=>0,
                'notes'=>$request->notes,
            ];
            $student->update($data);
            notify()->success('تم تعديل الطالب بنجاح' ,'');
            return redirect()->route('students.index');
        }catch(\Exception $ex){
            notify()->error('هناك خطأ ما','');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }

    public function lessonscreate(Student $student){
        $vehicles = Vehicle::get();
        $lessons = Lesson::where('student_id', $student->id)->get();
        return view('lessons.create',compact(['student','vehicles','lessons']));
    }
    public function destroy(Student $student)
    {
        try{
            $student->delete();
            notify()->success('تم حذف الطالب بنجاح' ,'');
            return redirect()->route('students.index');
        }catch(\Exception $ex){
            notify()->error('هناك خطأ ما','');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }
}
