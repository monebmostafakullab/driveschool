<div>
    <form action="" method="">
        @csrf
      <div class="card-body">
            <div class="row">
                    <div class="col-4">
                        <div class="d-flex flex-row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="DOS">التاريخ</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group date" id="DOS" data-target-input="nearest">
                                    <input type="date" wire:model.defer="DOS"   class="form-control datetimepicker-input @error('DOS') is-invalid @enderror" data-target="#DOS"/>
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
                                    <label for="time"> الوقت </label>
                                </div>
                            </div>
                            <div class="form-group col-8">
                                <select wire:model="time" class="form-control @error('time') is-invalid @enderror">
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
      </div>
      <div>
        <button class="btn btn-primary btn-sm" wire:click.prevent="search" >بحث</button>
      </div>
      <br>
      @if (Session::has('message'))
        <div class="alert alert-{{session('message.status')}} alert-dismissible fade show" role="alert">
            {{session('message.message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
      @endif

      <div @if ($dailytable == false) hidden @endif>
        <div class="card">
            <div class="card-header">
              <h3 class="card-title"> الجدول اليومي</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>تسلسلي</th>
                    <th>اسم الطالب</th>
                    <th>رقم الهوية</th>
                    <th>عدد الدروس المنفذة</th>
                    <th>رقم الدرس</th>
                    <th>رقم الجوال</th>
                    <th>اجمالي الدفعات</th>
                    <th>التحكم </th>
                  </tr>
                </thead>
                <tbody>
                    @if (isset($lessons))
                        @foreach ($lessons as $index=>$lesson)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$lesson->student->fullname}}</td>
                                <td>{{$lesson->student->idno}}</td>
                                <td>{{$lesson->student->activeLessons()}}</td>
                                <td>999</td>
                                <td>{{$lesson->student->mobile1}}</td>
                                <td>{{$lesson->student->payment}}</td>
                                <td>
                                    <livewire:toggle-button :model="$lesson" field="status" key="{{ $lesson->id }}" />
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
              </table>
            </div>
          </div>
      </div>
    </form>
</div>
@livewireScripts
@section('script')
<script>
$(document).ready( function() {

});​
</script>
@endsection