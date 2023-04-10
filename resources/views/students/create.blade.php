@extends('layouts.master')
@section('title')
    اضافة طالب جديد
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
                <li class="breadcrumb-item"><a href="{{route('students.index')}}">الطلاب</a></li>
              <li class="breadcrumb-item active"> اضافة طالب جديد</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">اضافة طالب جديد</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('students.store')}}" method="POST">
            @csrf
          <div class="card-body">
            <fieldset class="border p-2">
                <legend  class="w-auto">البيانات الشخصية</legend>
                <div class="d-flex flex-row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="fname">اسم الطالب</label>
                        </div>
                    </div>
                    <input type="text" name="fname" value="{{old('fname')}}" class="form-control @error('fname') is-invalid @enderror" id="fname" placeholder="الاسم الأول " >
                    <input type="text" name="sname" value="{{old('sname')}}" class="form-control @error('sname') is-invalid @enderror" id="sname" placeholder="اسم الأب">
                    <input type="text" name="thname" value="{{old('thname')}}" class="form-control @error('thname') is-invalid @enderror" id="thname" placeholder="اسم الجد">
                    <input type="text" name="lname" value="{{old('lname')}}" class="form-control @error('lname') is-invalid @enderror" id="lname" placeholder="اسم العائلة">
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="idno">رقم الهوية</label>
                                </div>
                            </div>
                            <input type="text" name="idno" value="{{old('idno')}}" class="form-control @error('idno') is-invalid @enderror" id="idno" placeholder="ادخل رقم الهوية">
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
                                    <input type="date" name="DOB" value="{{old('DOB')}}" class="form-control datetimepicker-input @error('DOB') is-invalid @enderror" data-target="#DOB"/>
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
                                    <label for="DOB">الجنس</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select name = "gender" class="form-control @error('gender') is-invalid @enderror">
                                    @foreach ($genders as $gender)
                                        <option value="{{$gender->id}}" @if ($gender->id == old('gender')) selected @endif>{{$gender->gender_name}}</option>
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
                            <input type="text" value="{{old('mobile1')}}" name="mobile1" class="form-control @error('mobile1') is-invalid @enderror" id="mobile1" placeholder="ادخل رقم الجوال الأول">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="mobile2">رقم الجوال الثاني</label>
                                </div>
                            </div>
                            <input type="text" value="{{old('mobile2')}}" name="mobile2" class="form-control @error('mobile2') is-invalid @enderror" id="mobile2" placeholder="ادخل رقم الجوال الثاني">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="email">البريد الالكتروني</label>
                                </div>
                            </div>
                            <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="ادخل البريد الالكتروني">
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
                                <select  name = "city" class="form-control @error('city') is-invalid @enderror">
                                    @foreach ($cities as $city)
                                        <option value="{{$city->id}}" @if (old('city') == $city->id) selected @endif>{{$city->city_name}}</option>
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
                            <input type="text" value="{{old('address')}}" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="ادخل العنوان">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2">
                <legend  class="w-auto">بيانات الرخصة</legend>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="license_type">نوع الرخصة</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select name="license_type" class="form-control @error('license_type') is-invalid @enderror">
                                    @foreach ($license_types as $license_type)
                                        <option value="{{$license_type->id}}" @if (old('license_type') == $license_type->id) selected @endif>{{$license_type->license_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="contract_type">نوع الاتفاقية</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select name="contract_type" class="form-control @error('contract_type') is-invalid @enderror">
                                    @foreach ($contract_types as $contract_type)
                                        <option value="{{$contract_type->id}}" @if (old('contract_type') == $contract_type->id) selected @endif>{{$contract_type->contract_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="cost">التكلفة</label>
                                </div>
                            </div>
                            <div class="col-9">
                                <input type="text" value="{{old('cost')}}" name="cost" class="form-control @error('cost') is-invalid @enderror" id="cost" placeholder="التكلفة">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="check_type">نوع الفحص</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select name="check_type" class="form-control">
                                    @foreach ($check_types as $check_type)
                                        <option value="{{$check_type->id}}" @if (old('check_type') == $check_type->id) selected @endif>{{$check_type->check_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="sign_check_type">نوع فحص الاشارات</label>
                                </div>
                            </div>
                            <div class="form-group col-7">
                                <select name="sign_check_type" class="form-control @error('sign_check_type') is-invalid @enderror">
                                    @foreach ($sign_check_types as $sign_check_type)
                                        <option value="{{$sign_check_type->id}}" @if (old('sign_check_type') == $sign_check_type->id) selected @endif>{{$sign_check_type->sign_check_name}}</option>
                                    @endforeach
                                </select>
                            </div>   
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="app_date">تاريخ الطلب</label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <div class="input-group date" id="app_date" data-target-input="nearest">
                                    <input type="date" value="{{old('app_date')}}" name="app_date" class="form-control datetimepicker-input @error('app_date') is-invalid @enderror" data-target="#app_date"/>
                                    <div class="input-group-append" data-target="#app_date" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
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
                            <textarea name="notes" id="notes" cols="30" rows="3" class="form-control @error('notes') is-invalid @enderror" placeholder="ملاحظات">{{old('notes')}}</textarea>
                        </div>
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

//Date picker
// $('#DOB').datetimepicker({
//     format: 'L'
// });
// $('#app_date').datetimepicker({
//     format: 'L'
// });
</script>
@endsection