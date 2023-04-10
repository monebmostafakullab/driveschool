<?php

namespace App\Http\Livewire;

use App\Models\Lesson;
use Livewire\Component;

class Dailytable extends Component
{

    public $dailytable = false;
    public $vehicles;
    public $DOS;
    public $time;
    public $vehicle_id;
    public $lessons;


    public function render()
    {
        $this->DOS = date('Y-m-d');
        return view('livewire.dailytable');
    }

    public function search(){
        if(!empty($this->DOS) && !empty($this->time) && !empty($this->vehicle_id)){
            $lessons = Lesson::where('lesson_date',$this->DOS)->where('lesson_time',$this->time)->where('vehicle_id',$this->vehicle_id)->get();
        }elseif(!empty($this->DOS) && !empty($this->time)){
            $lessons = Lesson::where('lesson_date',$this->DOS)->where('lesson_time',$this->time)->get();
        }elseif(!empty($this->DOS) && !empty($this->vehicle_id)){
            $lessons = Lesson::where('lesson_date',$this->DOS)->where('vehicle_id',$this->vehicle_id)->get();
        }elseif(!empty($this->time) && !empty($this->vehicle_id)){
            $lessons = Lesson::where('lesson_time',$this->time)->where('vehicle_id',$this->vehicle_id)->get();
        }elseif(!empty($this->DOS)){
            $lessons = Lesson::where('lesson_date',$this->DOS)->get();
        }elseif(!empty($this->time)){
            $lessons = Lesson::where('lesson_time',$this->time)->get();
        }elseif(!empty($this->DOS)){
            $lessons = Lesson::where('vehicle_id',$this->vehicle_id)->get();
        }else{
            session()->flash('message',['status'=>'danger','message'=>'تحذير: جميع الحقول فارغة ']);
        }
        if(isset($lessons)){
            if(!$lessons->isEmpty()){
                $this->dailytable = true;
                $this->lessons = $lessons;

            }else{
                $this->dailytable = false;
                session()->flash('message',['status'=>'warning','message'=>'لا يوجد بيانات']);
            }
        }

    }
}
