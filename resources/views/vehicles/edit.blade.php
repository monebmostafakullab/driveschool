@extends('layouts.master')
@section('title')
    تعديل مركبة 
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
                <li class="breadcrumb-item"><a href="{{route('vehicles.index')}}">المركبات</a></li>
              <li class="breadcrumb-item active"> تعديل مركبة </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">تعديل  مركبة</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{route('vehicles.update',$vehicle->id)}}" method="POST">
            @csrf
            @method('PUT')
          <div class="card-body">
            <fieldset class="border p-2">
                <legend  class="w-auto"> بيانات المركبة</legend>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="vehicle_no">رقم المركبة</label>
                                </div>
                            </div>
                            <input type="text" name="vehicle_no" value="{{old('vehicle_no',$vehicle->vehicle_no)}}" class="form-control @error('vehicle_no') is-invalid @enderror" id="vehicle_no" placeholder="ادخل رقم المركبة">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="vehicle_category_id">تصنيف المركبة</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select  name = "vehicle_category_id" class="form-control @error('vehicle_category_id') is-invalid @enderror">
                                    @foreach ($vehicle_categories as $vehicle_category)
                                        <option value="{{$vehicle_category->id}}" @if (old('vehicle_category_id',$vehicle->vehicle_category_id) == $vehicle_category->id) selected @endif>{{$vehicle_category->v_cat_name}}</option>
                                    @endforeach
                                </select>
                            </div>      
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_production_date">سنة الصنع </label>
                                </div>
                            </div>
                            <input type="text" name="v_production_date" value="{{old('v_production_date',$vehicle->v_production_date)}}" class="form-control @error('v_production_date') is-invalid @enderror" id="v_production_date" placeholder="  أدخل سنة الصنع">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_color">اللون </label>
                                </div>
                            </div>
                            <input type="text" name="v_color" value="{{old('v_color',$vehicle->v_color)}}" class="form-control @error('v_color') is-invalid @enderror" id="v_color" placeholder="اللون">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_type">نوع السيارة </label>
                                </div>
                            </div>
                            <input type="text" name="v_type" value="{{old('v_type',$vehicle->v_type)}}" class="form-control @error('v_type') is-invalid @enderror" id="v_type" placeholder="نوع السيارة">
                        </div>
                    </div>
                </div>
            </fieldset>
            <fieldset class="border p-2">
                <legend  class="w-auto">بيانات الملكية والتأمين</legend>
                <div class="row">
                    <div class="col-3">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_insurance_type_id">نوع التأمين </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <select  name = "v_insurance_type_id" class="form-control @error('v_insurance_type_id') is-invalid @enderror">
                                    @foreach ($v_insurance_types as $v_insurance_type)
                                        <option value="{{$v_insurance_type->id}}" @if (old('v_insurance_type_id',$vehicle->v_insurance_type_id) == $v_insurance_type->id) selected @endif>{{$v_insurance_type->v_insurance_type}}</option>
                                    @endforeach
                                </select>
                            </div>      
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_insurance_expired_date">تاريخ انتهاء التأمين</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="v_insurance_expired_date" data-target-input="nearest">
                                    <input type="date" name="v_insurance_expired_date" value="{{old('v_insurance_expired_date',$vehicle->v_insurance_expired_date)}}" class="form-control datetimepicker-input @error('v_insurance_expired_date') is-invalid @enderror" data-target="#v_insurance_expired_date"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="v_license_expired_date">تاريخ انتهاء الترخيص</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="v_license_expired_date" data-target-input="nearest">
                                    <input type="date" name="v_license_expired_date" value="{{old('v_license_expired_date',$vehicle->v_license_expired_date)}}" class="form-control datetimepicker-input @error('v_license_expired_date') is-invalid @enderror" data-target="#v_license_expired_date"/>
                                    <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
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
                                    <label for="v_notes">ملاحظات</label>
                                </div>
                            </div>
                            <textarea name="v_notes" id="v_notes" cols="30" rows="3" class="form-control @error('v_notes') is-invalid @enderror" placeholder="ملاحظات">{{old('v_notes',$vehicle->v_notes)}}</textarea>
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