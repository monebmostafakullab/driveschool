@extends('layouts.master')
@section('title')
    اضافة موظف جديد
@endsection
@section('title')
    الرئيسية
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
                <li class="breadcrumb-item"><a href="{{route('employees.index')}}">الطلاب</a></li>
              <li class="breadcrumb-item active"> اضافة موظف جديد</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">اضافة موظف جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('employees.update',$employee->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <fieldset class="border p-2">
                <legend  class="w-auto">البيانات الشخصية</legend>
                <div class="d-flex flex-row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="fname">اسم الموظف</label>
                        </div>
                    </div>
                    <input type="text" name="fname" value="{{old('fname',$employee->fname)}}" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="الاسم الأول " >
                    <input type="text" name="sname" value="{{old('sname',$employee->sname)}}" class="form-control @error('sname') is-invalid @enderror" id="sname" placeholder="اسم الأب">
                    <input type="text" name="thname" value="{{old('thname',$employee->thname)}}" class="form-control @error('thname') is-invalid @enderror" id="thname" placeholder="اسم الجد">
                    <input type="text" name="lname" value="{{old('lname',$employee->lname)}}" class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="اسم العائلة">
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="idno">رقم الهوية</label>
                                </div>
                            </div>
                            <input type="text" name="idno" value="{{old('idno',$employee->idno)}}" class="form-control @error('idno') is-invalid @enderror" id="idno" placeholder="ادخل رقم الهوية">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="DOB">تاريخ الميلاد</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="DOB" data-target-input="nearest">
                                    <input type="date" name="DOB" value="{{old('DOB',$employee->DOB)}}" class="form-control datetimepicker-input @error('DOB') is-invalid @enderror" data-target="#DOB"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="d-flex flex-row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="gender">الجنس</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select id="gender" name = "gender" class="form-control @error('gender') is-invalid @enderror">
                                    @foreach ($genders as $gender)
                                        <option value="{{$gender->id}}" @if ($gender->id == old('gender',$employee->gender_id)) selected @endif>{{$gender->gender_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="mobile1">رقم الجوال الأول</label>
                                </div>
                            </div>
                            <input type="text" value="{{old('mobile1',$employee->mobile1)}}" name="mobile1" class="form-control @error('mobile1') is-invalid @enderror" id="mobile1" placeholder="ادخل رقم الجوال الأول">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="mobile2">رقم الجوال الثاني</label>
                                </div>
                            </div>
                            <input type="text" value="{{old('mobile2',$employee->mobile2)}}" name="mobile2" class="form-control @error('mobile2') is-invalid @enderror" id="mobile2" placeholder="ادخل رقم الجوال الثاني">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="email">البريد الالكتروني</label>
                                </div>
                            </div>
                            <input type="email" value="{{old('email',$employee->email)}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="ادخل البريد الالكتروني">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="city">المدينة</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select id="city" name = "city" class="form-control @error('city') is-invalid @enderror">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}" @if (old('city',$employee->city_id) == $city->id) selected @endif>{{$city->city_name}}</option>
                                    @endforeach
                                </select>
                            </div>      
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="d-flex flex-row">
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="address">العنوان</label>
                                </div>
                            </div>
                            <input type="text" value="{{old('address',$employee->address)}}" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="ادخل العنوان">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="empl_category">التصنيف</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select id="empl_category" name = "empl_category" class="form-control @error('empl_category') is-invalid @enderror">
                                    @foreach ($empl_categories as $empl_category)
                                        <option value="{{$empl_category->id}}" data-empcategorytype="{{$empl_category->type}}" @if ($empl_category->id == old('empl_category',$employee->empl_category_id)) selected @endif>{{$empl_category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="assignment_date">تاريخ التعيين</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="assignment_date" data-target-input="nearest">
                                    <input type="date" name="assignment_date" value="{{old('assignment_date',$employee->assignment_date)}}" class="form-control datetimepicker-input @error('assignment_date') is-invalid @enderror" data-target="#assignment_date"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="sallary">الراتب</label>
                                </div>
                            </div>
                            <input type="text" value="{{old('sallary',$employee->sallary)}}" name="sallary" class="form-control @error('sallary') is-invalid @enderror" id="sallary" placeholder="ادخل الراتب">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="d-flex flex-row">
                            <div class="col-1">
                                <div class="form-group">
                                    <label for="notes">ملاحظات</label>
                                </div>
                            </div>
                            <textarea name="notes" id="notes" cols="30" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="ملاحظات">{{old('notes',$employee->notes)}}</textarea>
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2" id="trainingdata" @if ($employee_category_type == 0) hidden=true @endif>
                <legend  class="w-auto">بيانات التدريب</legend>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="license_no">رقم رخصة القيادة</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <input id="license_no" type="text" value="{{old('license_no',$employee->license_no)}}" name="license_no" class="form-control @error('license_no') is-invalid @enderror" id="cost" placeholder="رقم رخصة القيادة">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="license_grade">الدرجة</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select id="license_grade" name="license_grade" class="form-control @error('license_grade') is-invalid @enderror">
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}" @if (old('license_grade',$employee->license_grade_id) == $grade->id) selected @endif>{{$grade->grade_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="license_expired_date">تاريخ انتهاء رخصة القيادة</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="license_expired_date" data-target-input="nearest">
                                    <input type="date" name="license_expired_date" value="{{old('license_expired_date',$employee->license_expired_date)}}" class="form-control datetimepicker-input @error('license_expired_date') is-invalid @enderror" data-target="#license_expired_date"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="t_license_no">رقم رخصة التدريب</label>
                                </div>
                            </div>
                            <div class="col-7">
                                <input id="t_license_no" type="text" value="{{old('t_license_no',$employee->t_license_no)}}" name="t_license_no" class="form-control @error('t_license_no') is-invalid @enderror" id="cost" placeholder="رقم رخصة التدريب">
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="t_license_grade">الدرجة</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select id="t_license_grade" name="t_license_grade" class="form-control @error('t_license_grade') is-invalid @enderror">
                                    @foreach ($grades as $grade)
                                        <option value="{{$grade->id}}" @if (old('t_license_grade',$employee->t_license_grade_id) == $grade->id) selected @endif>{{$grade->grade_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="t_license_expired_date">تاريخ انتهاء رخصة التدريب</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="t_license_expired_date" data-target-input="nearest">
                                    <input type="date" name="t_license_expired_date" value="{{old('t_license_expired_date',$employee->t_license_expired_date)}}" class="form-control datetimepicker-input @error('license_expired_date') is-invalid @enderror" data-target="#license_expired_date"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="training_types">رخصة التدريب تشمل</label>
                        </div>
                    </div>
                    <div class="col-4">
                        @foreach ($training_types as $training_type)
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" type="checkbox" @if(is_array(old('training_types',$employee_training_type_ids)) && in_array($training_type->id, old('training_types',$employee_training_type_ids)))) checked @endif name="training_types[]" id="{{$training_type->id}}" value="{{$training_type->id}}">
                                <label for="{{$training_type->id}}" class="custom-control-label">{{$training_type->training_type_name}}</label>
                            </div>
                        @endforeach
                    </div>  
                </div>
            </fieldset>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">حفظ</button>
          </div>
        </form>
      </div>
</div>
@endsection
@section('script')
    <script>
        $(function () {
            $("#empl_category").change(function(){ 
                var employee_category_type = $(this).children("option:selected").data('empcategorytype');
                if(employee_category_type == 0){
                    $('#trainingdata').attr("hidden",true);
                }else if(employee_category_type == 1){
                    $('#trainingdata').attr("hidden",false);
                }
            });

            // $('#DOB').datetimepicker({
            //     format: 'L'
            // });
            // $('#date_app').datetimepicker({
            //     format: 'L'
            // });
        });
    </script>
@endsection