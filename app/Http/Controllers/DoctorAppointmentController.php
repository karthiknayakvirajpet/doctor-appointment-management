<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Doctor;
use DB;
use Session;

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

    #*****************************************************************************
    #Create Appointment
    #*****************************************************************************
    public function createAppointment(Request $request)
    {
        $result = Doctor::get()->where('active', 1);

        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        if ($validator->fails())
        {
            $errors = $validator->errors();
            return view('add-appointment-view-page')->with(array('errors'=>$errors, 'result'=>$result));
        }

        $datas = [
            ['doctor_id' => $request->doctor_id, 'day' => ($request->monday ? $request->monday : 1), 'start_time' => ($request->m_start_time ? $request->m_start_time : '00:00:00'), 'end_time' => ($request->m_end_time ? $request->m_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->tuesday ? $request->tuesday : 2), 'start_time' => ($request->t_start_time ? $request->t_start_time : '00:00:00'), 'end_time' => ($request->t_end_time ? $request->t_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->wednesday ? $request->wednesday : 3), 'start_time' => ($request->w_start_time ? $request->w_start_time : '00:00:00'), 'end_time' => ($request->w_end_time ? $request->w_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->thursday ? $request->thursday : 4), 'start_time' => ($request->th_start_time ? $request->th_start_time : '00:00:00'), 'end_time' => ($request->th_end_time ? $request->th_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->friday ? $request->friday : 5), 'start_time' => ($request->f_start_time ? $request->f_start_time : '00:00:00'), 'end_time' => ($request->f_end_time ? $request->f_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->saturday ? $request->saturday : 6), 'start_time' => ($request->s_start_time ? $request->s_start_time : '00:00:00'), 'end_time' => ($request->s_end_time ? $request->s_end_time : '00:00:00')],

            ['doctor_id' => $request->doctor_id, 'day' => ($request->sunday ? $request->sunday : 7), 'start_time' => ($request->su_start_time ? $request->su_start_time : '00:00:00'), 'end_time' => ($request->su_end_time ? $request->su_end_time : '00:00:00')],
        ];

        $created = date("Y-m-d H:i:s");
        foreach ($datas as $data)
        {
            $insert_params = array(
                'doctor_id' => $data['doctor_id'],
                'day' => $data['day'],
                'open_status' => ($data['end_time'] == '00:00:00' ? 0 : 1),
                'start_time' => $data['start_time'],
                'end_time' => $data['end_time'],
                'created_at' => $created,
                'updated_at' => $created
            );

            DB::table('time_availability')->insert($insert_params);
        }
        
        return redirect('/index')->with('message', 'Details added successfully');
    }

    
}
