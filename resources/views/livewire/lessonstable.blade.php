<form action="" method="">
    @csrf
  <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="student_name"> اسم الطالب</label>
                        </div>
                    </div>
                    <input type="text" wire:model="student_name" name="student_name" value="{{$student->fullname}}" class="form-control" id="student_name" disabled>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="student_license"> نوع الرخصة</label>
                        </div>
                    </div>
                    <input type="text" wire:model="student_license" name="student_license" value="{{$student->license_type->license_name}}" class="form-control" id="student_license" disabled>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="vehicle_id">المركبة </label>
                        </div>
                    </div>
                    <div class="form-group col-8">
                        <select wire:model="vehicle_id" class="form-control @error('vehicle_id') is-invalid @enderror">
                            <option  value="" >اختر مركبة</option>
                            @foreach ($vehicles as $vehicle)
                                <option  value="{{$vehicle->id}}" >{{$vehicle->vehicle_no}}</option>
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
                            <label for="DOS">تاريخ بداية الدرس</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group date" id="DOS" data-target-input="nearest">
                            <input type="date" wire:model="DOS" value="{{old('DOS')}}" class="form-control datetimepicker-input @error('DOS') is-invalid @enderror" data-target="#DOS"/>
                            <div class="input-group-append" data-target="#DOB" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="no_of_lessons"> عدد الدروس</label>
                        </div>
                    </div>
                    <input type="text" wire:model="no_of_lessons" value="{{old('no_of_lessons')}}" class="form-control @error('no_of_lessons') is-invalid @enderror" id="no_of_lessons" >
                </div>
            </div>
            <div class="col-4">
                <div class="d-flex flex-row">
                    <div class="col-4">
                        <div class="form-group">
                            <label for="lesson_time"> الوقت </label>
                        </div>
                    </div>
                    <div class="form-group col-8">
                        <select wire:model="lesson_time" class="form-control @error('lesson_time') is-invalid @enderror">
                            <option  value="" selected >اختر الوقت</option>
                            <option  value="8" >الثامنة صباحا</option>
                            <option  value="9" >التاسعة صباحا</option>
                            <option  value="10" >العاشرة صباحا</option>
                            <option  value="11" >الحادي عشر صباحا</option>
                            <option  value="12" >الثانية عشر  صباحا</option>
                            <option  value="1" >الواحدة ظهرا</option>
                            <option  value="2" >الثانية ظهرا</option>
                            <option  value="3" >الثالثة ظهرا</option>
                        </select>
                    </div> 
                    {{-- <input type="text" wire:model="lesson_time" value="{{old('lesson_time')}}" class="form-control @error('lesson_time') is-invalid @enderror" id="lesson_time" > --}}
                </div>
            </div>
        </div>
        <div class="d-flex flex-row">
            <div class="col-2">
                <div class="form-group">
                    <label for="">الأيام</label>
                </div>
            </div>
            <div class="col-5 ">
                <div class="row">
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="saturday" value="Sat">
                        <label for="saturday" class="custom-control-label">السبت</label>
                    </div>
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="sunday" value="Sun">
                        <label for="sunday" class="custom-control-label">الأحد</label>
                    </div>
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="monday" value="Mon">
                        <label for="monday" class="custom-control-label">الاثنين</label>
                    </div>
                </div>
            </div>  
            <div class="col-5">
                <div class="row">
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="tuesday" value="Tue">
                        <label for="tuesday" class="custom-control-label">الثلاثاء</label>
                    </div>
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="wednesday" value="Wed">
                        <label for="wednesday" class="custom-control-label">الاربعاء</label>
                    </div>
                    <div class="custom-control custom-checkbox col-4">
                        <input class="custom-control-input @error('days') is-invalid @enderror " type="checkbox" wire:model="days" id="thursday" value="Thu">
                        <label for="thursday" class="custom-control-label">الخميس</label>
                    </div>
                </div>
            </div> 
        </div>
  </div>
  @if (Session::has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
  @endif
  <div @if ($table_access == false) hidden @endif  >
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">جدول الحصص</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>رقم الدرس</th>
                <th>اليوم</th>
                <th>التاريخ</th>
                <th>الوقت</th>
                <th>التحكم</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($lessons as $index=>$lesson)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>
                        @if (date('D', strtotime($lesson->lesson_date)) == 'Sat') السبت 
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Sun') الأحد
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Mon') الإثنين
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Tue') الثلاثاء
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Wed') الأربعاء
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Thu') الخميس
                        @elseif(date('D', strtotime($lesson->lesson_date)) == 'Fri') الجمعة
                        @endif
                    </td>
                    <td>{{ $lesson->lesson_date }}</td>
                    <td>{{ $lesson->lesson_time }}</td>
                    <td>
                        {{-- زر تعديل درس --}}
                        <button 
                        wire:click.prevent="selectedItem({{$lesson->id}},{{$index}},'update')" class="btn btn-success btn-xs update"><i class="fa fa-edit"> </i> تعديل </button>
                        {{-- زر حذف درس --}}
                        <button 
                        wire:click.prevent="selectedItem({{$lesson->id}},{{$index}},'delete')" class="btn btn-danger btn-xs delete"><i class="fa fa-trash"> </i> حذف </button>                      
                        {{-- مودال تعديل درس --}}
                        <div class="modal hide fade" id="updatelesson_modal" tabindex="-1" role="dialog" aria-labelledby="updatelesson_modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="updatelesson_modalLabel">{{$updatelable}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <input type="hidden" id="lesson_id" wire:model='lesson_id' value="">
                                        <div class="form-group">
                                            <label for="vehicle_id" class="col-form-label">المركبة</label>
                                            <select id='vehicle_id' wire:model.defer="Avehicle_id" class="form-control @error('Avehicle_id') is-invalid @enderror">
                                                <option  value="" >اختر مركبة</option>
                                                @foreach ($vehicles as $vehicle)
                                                    <option  value="{{$vehicle->id}}" >{{$vehicle->vehicle_no}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="ADOS" class="col-form-label">تاريخ الدرس</label>
                                            <div class="input-group date " id="ADOS" data-target-input="nearest">
                                                <input id="lesson_date" type="date" wire:model.defer="ADOS"  class="form-control datetimepicker-input @error('ADOS') is-invalid @enderror" data-target="#ADOS"/>
                                                <div class="input-group-append" data-target="#DOS" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>                               
                                        </div>
                                        <div class="form-group">
                                            <label for="lesson_time "> وقت الدرس</label>
                                            <select wire:model.defer="Alesson_time" id='lesson_time' class="form-control  @error('Alesson_time') is-invalid @enderror">
                                                <option  value="" selected >اختر الوقت</option>
                                                <option  value="8" >الثامنة صباحا</option>
                                                <option  value="9" >التاسعة صباحا</option>
                                                <option  value="10" >العاشرة صباحا</option>
                                                <option  value="11" >الحادي عشر صباحا</option>
                                                <option  value="12" >الثانية عشر  صباحا</option>
                                                <option  value="1" >الواحدة ظهرا</option>
                                                <option  value="2" >الثانية ظهرا</option>
                                                <option  value="3" >الثالثة ظهرا</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                                    <button type="button" class="btn btn-primary" wire:click.prevent="updateLesson">تعديل</button>
                                </div>
                            </div>
                            </div>
                        </div> 
                        {{-- مودال حذف درس --}}
                        <div class="modal hide fade" id="deletelesson_modal" tabindex="-1" role="dialog" aria-labelledby="deletelesson_modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog ">
                                <div class="modal-content  bg-danger">
                                    <div class="modal-header">
                                        <p class="modal-title" id="deletelesson_modalLabel"> {{$deletelable}}</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button"  class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                                        <button class='btn btn-outline-light' wire:click.prevent="deleteLesson" data-dismiss="modal" type='submit' >تأكيد الحذف</button>
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <button @if ($create_button == false) hidden  @endif type="button" wire:click.prevent="create" class="btn btn-primary">إنشاء</button>
    <button @if ($delete_button == false) hidden  @endif type="button"  data-toggle="modal" data-target="#update_modal" class="btn btn-primary">تعديل</button>
    <button @if ($delete_button == false) hidden  @endif type="button"  data-toggle="modal" data-target="#delete_modal" class="btn btn-danger">حذف</button>
    {{-- مودال تعديل الجدول بالكامل --}}
    <div class="modal fade" id="update_modal">
        <div class="modal-dialog">
          <div class="modal-content bg-primary">
            <div class="modal-header">
              <p class="modal-title">سيتم حذف جدول الحصص القديم وبناء جدول جديد . هل أنت متأكد من ذلك</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                <button class='btn btn-outline-light' wire:click.prevent="update" data-dismiss="modal" type='submit' >تأكيد التعديل</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- مودال حذف الجدول بالكامل --}}
    <div class="modal fade" id="delete_modal">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <p class="modal-title">هل تود حذف الجدول</p>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">إغلاق</button>
                <button class='btn btn-outline-light' wire:click.prevent="delete" data-dismiss="modal" type='submit' >تأكيد الحذف</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
  </div>
</form>
@livewireScripts
@section('script')
<script>

        window.addEventListener('openUpdateLessonModal', event => {
            $("#updatelesson_modal").modal('show');
        })

        window.addEventListener('closeUpdateLessonModal', event => {
            $("#updatelesson_modal").modal('hide');
        })

        window.addEventListener('openDeleteLessonModal', event => {
            $("#deletelesson_modal").modal('show');
        })

        window.addEventListener('closeDeleteLessonModal', event => {
            $("#deletelesson_modal").modal('hide');
        })

</script>
@endsection

