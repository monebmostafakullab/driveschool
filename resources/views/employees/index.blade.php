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
        <h1 class="m-0">الموظفين</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active">الموظفين</li>
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
                      <th>رقم الموظف</th>
                      <th>الاسم</th>
                      <th>رقم الهوية</th>
                      <th>تصنيف المدرب</th>
                      <th>تاريخ التعيين</th>
                      <th>درجة رخصة القيادة</th>
                      <th>درجة رخصة التدريب</th>
                      <th>التحكم</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        <tr>
                            <td>{{$employee->id}}</td>
                            <td>{{$employee->fullname}}</td>
                            <td>{{$employee->idno}}</td>
                            <td>{{$employee->empl_category->category_name}}</td>
                            <td>{{$employee->assignment_date}}</td>
                            <td>{{$employee->license_grade->grade_name}}</td>
                            <td>{{$employee->t_license_grade->grade_name}}</td>
                            <td>
                              <a class='btn btn-success btn-xs' href="{{route('employees.edit',$employee->id)}}"><i class="fa fa-edit"></i></a>  
                              <button type="button" class="btn btn-danger btn-xs delete"  data-url="{{route('employees.destroy',$employee->id)}}" data-toggle="modal" data-target="#delete_modal">
                                <i class="fa fa-trash"></i>
                              </button>
                              <div class="modal fade" id="delete_modal">
                                <div class="modal-dialog">
                                  <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                      <p class="modal-title">هل تود حذف الطالب </p>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                                      <form  action="" id="deleteFormEmployee" method='POST' class="d-inline">
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
            {text:'<i class="fa fa-plus"></i>' ,className: 'btn btn-success btn-lg ml-3',action: function ( e, dt, node, config ) { onclick (window.location.href='/dashboard/employees/create')}},
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
        $('#deleteFormEmployee').attr('action', url );
      })
    });
  </script>
@endsection