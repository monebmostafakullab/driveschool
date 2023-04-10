@extends('layouts.master')
@section('title')
    المركبات
@endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header p-1">
    <div class="container-fluid">
    <div class="row ">
        <div class="col-sm-6">
        <h1 class="m-0">المركبات</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">الرئيسية</a></li>
            <li class="breadcrumb-item active">المركبات</li>
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
                      <th>تسلسلي</th>
                      <th>رقم المركبة</th>
                      <th> تصنيف المركبة</th>
                      <th>سنة الصنع </th>
                      <th>اللون </th>
                      <th>نوع السيارة</th>
                      <th>التحكم</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($vehicles as $index=>$vehicle)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$vehicle->vehicle_no}}</td>
                            <td>{{$vehicle->vehicle_category->v_cat_name}}</td>
                            <td>{{$vehicle->v_production_date}}</td>
                            <td>{{$vehicle->v_color}}</td>
                            <td>{{$vehicle->v_type}}</td>
                            <td>
                              <a class='btn btn-success btn-xs' href="{{route('vehicles.edit',$vehicle->id)}}"><i class="fa fa-edit"></i></a>  
                              <button type="button" class="btn btn-danger btn-xs delete" data-url="{{route('vehicles.destroy',$vehicle->id)}}" data-toggle="modal" data-target="#delete_modal">
                                <i class="fa fa-trash"></i>
                              </button>
                              <div class="modal fade" id="delete_modal">
                                <div class="modal-dialog">
                                  <div class="modal-content bg-danger">
                                    <div class="modal-header">
                                      <p class="modal-title">هل تود حذف المركبة</p>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                      <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                                      <form  action="" method='POST' id="deleteFormVehicle" class="d-inline">
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
            {text:'<i class="fa fa-plus"></i>' ,className: 'btn btn-success btn-lg ml-3',action: function ( e, dt, node, config ) { onclick (window.location.href='/dashboard/vehicles/create')}},
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
        $('#deleteFormVehicle').attr('action', url );
      })
    });
  </script>
@endsection