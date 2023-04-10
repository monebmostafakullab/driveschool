<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class Lessonstable extends Component
{
    public $student;
    public $vehicles;
    public $lessons;
    public $student_name;
    public $student_license;
    public $vehicle_id;
    public $DOS;
    public $no_of_lessons;
    public $lesson_time;
    public $days = [];
    public $table_access = false;
    public $create_button = true;
    public $update_button = false;
    public $delete_button = false;
    public $lesson_id;
    public $Avehicle_id;
    public $ADOS;
    public $Alesson_time;
    public $updatelable;
    public $deletelable;
    


    public function render()
    {
        $this->student_name = $this->student->fullname;
        $this->student_license = $this->student->license_type->license_name;
            if(!$this->lessons->isEmpty()){
                $this->table_access = true;
                $this->create_button = false;
                $this->update_button = true;
                $this->delete_button = true;
            };

        return view('livewire.lessonstable');
    }

    protected $rules = [
        'vehicle_id' => 'required',
        'DOS' => 'required',
        'no_of_lessons' => 'required',
        'lesson_time' => 'required',
        'days' => 'required',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create()
    {
        $this->validate();
        $count = 0;
        $daydate = $this->DOS;
        while( $count < $this->no_of_lessons) {
            $dayname = date('D', strtotime($daydate));
            if(in_array($dayname, $this->days)){
                $lesson = [
                    'school_id' => 1,
                    'student_id' => $this->student->id,
                    'vehicle_id' => $this->vehicle_id,
                    'lesson_date' => $daydate,
                    'lesson_time' => $this->lesson_time,
                ];
                $lessons = Lesson::create($lesson);
                if($lessons){
                    $this->table_access = true; 
                    $this->lessons = Lesson::where('student_id', $this->student->id)->get();
                    $this->create_button = false;    
                    $this->update_button = true;   
                    $this->delete_button = true; 
                }
                $count++;
                $daydate =  date('Y-m-d', strtotime($daydate. ' + 1 days'));
            }else{
                $daydate =  date('Y-m-d', strtotime($daydate. ' + 1 days'));
            }
        }
        session()->flash('message','تم اضافة الجدول بنجاح');

    }

    public function update()
    {
        $this->validate();
        $lessons = Lesson::where('student_id', $this->student->id)->delete();
        $count = 0;
        $daydate = $this->DOS;
        while( $count < $this->no_of_lessons) {
            $dayname = date('D', strtotime($daydate));
            if(in_array($dayname, $this->days)){
                $lesson = [
                    'school_id' => 1,
                    'student_id' => $this->student->id,
                    'vehicle_id' => $this->vehicle_id,
                    'lesson_date' => $daydate,
                    'lesson_time' => $this->lesson_time,
                ];
                $lessons = Lesson::create($lesson);
                if($lessons){
                    $this->table_access = true; 
                    $this->lessons = Lesson::where('student_id', $this->student->id)->get();
                    $this->create_button = false;    
                    $this->update_button = true;   
                    $this->delete_button = true; 
                }
                $count++;
                $daydate =  date('Y-m-d', strtotime($daydate. ' + 1 days'));
            }else{
                $daydate =  date('Y-m-d', strtotime($daydate. ' + 1 days'));
            }
        }
        session()->flash('message','تم تعديل الجدول بنجاح');
    }

    public function delete()
    {
        $lessons = Lesson::where('student_id', $this->student->id)->delete();
        $this->table_access = false; 
        $this->lessons = Lesson::where('student_id', $this->student->id)->get();
        $this->create_button = true;    
        $this->update_button = false;   
        $this->delete_button = false;
        session()->flash('message','تم حذف الجدول بنجاح');
    }
    

    public function selectedItem($lessonId,$index,$action)
    {
        $index = $index + 1;
        $this->lesson_id = $lessonId;
        if($action == 'update'){
            $this->emit('getLesson_id',$this->lesson_id);
            $this->dispatchBrowserEvent('openUpdateLessonModal');
            $lesson = Lesson::find($lessonId);
            $this->Avehicle_id = $lesson->vehicle_id;
            $this->ADOS = $lesson->lesson_date;
            $this->Alesson_time = $lesson->lesson_time;
            $this->updatelable = 'تعديل الدرس رقم ' . $index ;
        }elseif($action == 'delete'){
            $this->dispatchBrowserEvent('openDeleteLessonModal');
            $this->deletelable = 'هل تود حذف الدرس رقم ' . $index;
        }
    }



    public function deleteLesson(){
        $lesson = Lesson::find($this->lesson_id)->delete();
        $lessons = Lesson::where('student_id', $this->student->id)->get();
        if($lessons){
            $this->table_access = true; 
            $this->lessons = $lessons;
            $this->create_button = false;    
            $this->update_button = true;   
            $this->delete_button = true; 
        }
        session()->flash('message','تم حذف الدرس بنجاح');
    }

    public function updateLesson(){
        $lesson = Lesson::find($this->lesson_id);
        $lesson->update([
            'vehicle_id'=> $this->Avehicle_id,
            'lesson_date' => $this->ADOS,
            'lesson_time' => $this->Alesson_time,
        ]);
        $this->dispatchBrowserEvent('closeUpdateLessonModal');
        $lessons = Lesson::where('student_id', $this->student->id)->get();
        if($lessons){
            $this->table_access = true; 
            $this->lessons = $lessons;
            $this->create_button = false;    
            $this->update_button = true;   
            $this->delete_button = true; 
        }
        session()->flash('message','تم تعديل الدرس بنجاح');
    }
}
