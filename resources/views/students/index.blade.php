@extends('layouts.master')
@section('title')
    الطلاب
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-1">
    <div class="container-fluid">
    <div class="row ">
        <div class="col-sm-6">
        <h1 class="m-0">الطلاب</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الطلاب</li>
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
                  <table id="students-table" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>رقم الطالب</th>
                      <th>الاسم</th>
                      <th>رقم الهوية</th>
                      <th>نوع الرخصة</th>
                      <th>تاريخ الطالب</th>
                      <th>الحالة</th>
                      <th>التحكم</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->fullname}}</td>
                            <td>{{$student->idno}}</td>
                            <td>{{$student->license_type->license_name}}</td>
                            <td>{{$student->app_date}}</td>
                            <td>{{$student->student_status->st_status_name}}</td>
                            <td>
                              <a class='btn btn-success btn-xs' href="{{route('students.edit',$student->id)}}"><i class="fa fa-edit"></i></a>  
                              <a class='btn btn-primary btn-xs' href="{{route('students.lessonscreate',$student->id)}}">جدول الحصص</a>  
                              <button type="button" class="btn btn-danger btn-xs delete" data-url="{{route('students.destroy',$student->id)}}" data-toggle="modal" data-target="#delete_modal">
                                <i class="fa fa-trash"></i>
                              </button>
                              <div class="modal fade " id="delete_modal">
                                <div class="modal-dialog">
                                  <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                      <p class="modal-title">هل تود حذف الطالب</p>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                                      <form  action="" method='POST' id="deleteFormStudent" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button class='btn btn-outline-light' type='submit' >تأكيد الحذف</button>
                                      </form>
                                    </div>
                                  </div>
                                  <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                              </div>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
@endsection
@section('script')
<script>
    $(function () {
      $("#students-table").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        buttons:{
          buttons: [
            {text:'<i class="fa fa-plus"></i>' ,className: 'btn btn-success btn-lg ml-3',action: function ( e, dt, node, config ) { onclick (window.location.href='/dashboard/students/create')}},
            {extend: 'excel', text: 'Excel' },
            {extend: 'pdf', text: 'PDF' },
            {extend: 'print', text: 'Print' },
            {extend: 'colvis', text: 'اظهار / اخفاء' },
          ],
          dom: {
            button: {
                className: 'btn btn-primary btn-sm'
            }
         }
        }
        // "buttons": ["copy", "csv","excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#students-table_wrapper .col-md-6:eq(0)');
      // $('#example2').DataTable({
      //   "paging": true,
      //   "lengthChange": false,
      //   "searching": false,
      //   "ordering": true,
      //   "info": true,
      //   "autoWidth": false,
      //   "responsive": true,
      // });
      $(document).on('click', '.delete', function(e) {
        e.preventDefault();
        const url = $(this).data('url');
        $('#deleteFormStudent').attr('action', url );
      })
    });
  </script>
@endsection