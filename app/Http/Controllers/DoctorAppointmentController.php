<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Doctor;
use App\Models\TimeAvailability;
use DB;
use Session;
use Response;

class DoctorAppointmentController extends Controller
{
    #*****************************************************************************
    #Index Page
    #*****************************************************************************
    public function index(Request $request)
    {
        $doctors = Doctor::get()->where('active', 1);

        $data = DB::table('doctors')
                    ->select('doctors.*')
                    ->where('doctors.active', 1);

        //Search by Doctor ID
        if($request->doctor_id)
        {
            $data = $data->where('doctors.id', $request->doctor_id);
        }

        //Search by Doctor Name
        if($request->doctor_name)
        {
            $data = $data->where('doctors.name', 'LIKE', '%'.$request->doctor_name.'%');
        }
        if($request->day || $request->start_time || $request->end_time)
        {
            $data = $data->leftjoin('time_availability', 'doctors.id', '=', 'time_availability.doctor_id')
                    ->where('time_availability.open_status', 1)
                    ->groupBy('doctors.id');

            //Search by Day
            if($request->day)
            {
                $data = $data->where('time_availability.day', $request->day);
                             
            }

            //Search by Stat and End Time
            if($request->start_time && $request->end_time)
            {
                $data = $data->whereTime('time_availability.start_time', '>=', $request->start_time)
                             ->whereTime('time_availability.end_time', '<=', $request->end_time);
            }               
        }
        $result = $data->get();
        return view('index')->with(array('result'=>$result, 'doctors'=>$doctors));
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

        DB::beginTransaction();
        try
        {
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
            DB::commit();
            return redirect('/index')->with('message', 'Details added successfully');
        }
        catch (\Exception $e) 
        {
            DB::rollback();
            return redirect('add-appointment-view')->with('message', 'Failed to add details');
        }
    }

    #*****************************************************************************
    #Delete Doctor
    #*****************************************************************************
    public function deleteDoctor($id)
    {
        $result = Doctor::where('id', $id)->update(['active' => 0]);
        return redirect('/index');
    }


    #*****************************************************************************
    #Get Doctor Availability Details
    #*****************************************************************************
    public function getDoctorAvailability($doctor_id)
    {
        $result = array();
        $data = DB::table('time_availability')
                    ->select('time_availability.*', 'doctors.name')
                    ->join('doctors', 'time_availability.doctor_id', '=', 'doctors.id')
                    ->where('doctor_id', $doctor_id)
                    ->get();

        foreach ($data as $key => $r) 
        {
            $days = $r->day;

            switch ($days) 
            {
                case "1": $day = "Monday"; break;
                case "2": $day = "Tuesday"; break;
                case "3": $day = "Wednesday"; break;
                case "4": $day = "Thursday"; break;
                case "5": $day = "Friday"; break;
                case "6": $day = "Saturday"; break;
                case "7": $day = "Sunday"; break;
                default: $day = "";
            }

            $result[$key]['day'] = $day;
            $result[$key]['start_time'] = $r->start_time;
            $result[$key]['end_time'] = $r->end_time;
            $result[$key]['open_status'] = ($r->open_status == 0 ? 'No' : 'Yes');
        }
        return Response::json(array('success' => true, 'data' => $result)); 
    }

    
}
