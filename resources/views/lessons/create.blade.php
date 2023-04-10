@extends('layouts.master')
@section('title')
انشاء جدول الحصص
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
              <li class="breadcrumb-item active"> انشاء جدول الحصص  </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    @error('')
        {{$message}}
    @enderror
    <!-- /.content-header -->
<div class="container">
    <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">انشاء جدول الحصص للطالب {{ $student->fullname }}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        @livewire('lessonstable', ['student' => $student,'vehicles' => $vehicles,'lessons'=>$lessons])
    </div>
</div>
@endsection
@section('script')
<script>

</script>
@endsection