<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Vehicle;
use App\Models\VehicleCategory;
use App\Models\VInsuranceType;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        return view('vehicles.index',compact('vehicles'));
    }

    public function create()
    {
        $vehicle_categories = VehicleCategory::get();
        $v_insurance_types = VInsuranceType::get();
        return view('vehicles.create',compact(['vehicle_categories','v_insurance_types']));
    }

    public function store(StoreVehicleRequest $request)
    {
        try{
            $data = [
                'school_id' => 1,
                'vehicle_no'=> $request->vehicle_no,
                'vehicle_category_id'=>$request->vehicle_category_id,
                'v_production_date'=>$request->v_production_date,
                'v_color'=>$request->v_color,
                'v_type'=>$request->v_type,
                'v_insurance_type_id'=>$request->v_insurance_type_id,
                'v_insurance_expired_date'=>$request->v_insurance_expired_date,
                'v_license_expired_date'=>$request->v_license_expired_date,
                'v_notes'=>$request->v_notes,
            ];
            Vehicle::create($data);
            notify()->success('تم اضافة المركبة بنجاح' ,'');
            return redirect()->route('vehicles.index');
        }catch(\Exception $ex){
            notify()->error($ex->getMessage(),'');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Vehicle $vehicle)
    {
        $vehicle_categories = VehicleCategory::get();
        $v_insurance_types = VInsuranceType::get();
        return view('vehicles.edit',compact(['vehicle','vehicle_categories','v_insurance_types']));
    }

    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        try{
            $data = [
                'school_id' => 1,
                'vehicle_no'=> $request->vehicle_no,
                'vehicle_category_id'=>$request->vehicle_category_id,
                'v_production_date'=>$request->v_production_date,
                'v_color'=>$request->v_color,
                'v_type'=>$request->v_type,
                'v_insurance_type_id'=>$request->v_insurance_type_id,
                'v_insurance_expired_date'=>$request->v_insurance_expired_date,
                'v_license_expired_date'=>$request->v_license_expired_date,
                'v_notes'=>$request->v_notes,
            ];
            $vehicle->update($data);
            notify()->success('تم تعديل المركبة بنجاح' ,'');
            return redirect()->route('vehicles.index');
        }catch(\Exception $ex){
            notify()->error($ex->getMessage(),'');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }

    public function destroy(Vehicle $vehicle)
    {
        try{
            $vehicle->delete();
            notify()->success('تم حذف المركبة بنجاح' ,'');
            return redirect()->route('vehicles.index');
        }catch(\Exception $ex){
            notify()->error('هناك خطأ ما','');
            return redirect()->back()->withInput()->with('error',$ex->getMessage());
        }
    }
}
