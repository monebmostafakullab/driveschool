<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::get();
        return view('lessons.index',compact('vehicles'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show($id)
    {
        //
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
