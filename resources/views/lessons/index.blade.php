@extends('layouts.master')
@section('title')
    الموظفين
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-1">
    <div class="container-fluid">
    <div class="row ">
        <div class="col-sm-6">
        <h1 class="m-0">الجدول اليومي</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الجدول اليومي</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
            <!-- /.card -->
            <div class="card">
                {{-- <div class="card-header">
                    <a href="{{route('students.create')}}" class="btn btn-primary btn-sm">اضافة طالب جديد</a>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                    @livewire('dailytable', ['vehicles' => $vehicles])
                </div>
                <!-- /.card-body -->
            </div>
              <!-- /.card -->
@endsection
@section('script')
  <script>
    

  </script>
@endsection