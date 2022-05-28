<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Doctor;
use DB;

class DoctorAppointmentController extends Controller
{
    #*****************************************************************************
    #Index Page
    #*****************************************************************************
    public function index()
    {
        $result = Doctor::get()->where('active', 1);
        return view('index')->with(array('result'=>$result));
    }

    #*****************************************************************************
    #Add Appointment View Page
    #*****************************************************************************
    public function addAppointmentView()
    {
        $result = Doctor::get()->where('active', 1);
        return view('add-appointment-view-page')->with(array('result'=>$result));
    }
}
