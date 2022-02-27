<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Http\Requests\AppointmentRequest;
use App\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher['data'] = Teacher::orderby("lastname","asc")
        ->select('id','firstname','lastname')
        ->get();

        return view('appointments.index')->with("teacher",$teacher);
    }

    public function showAppointment(){
        return view('appointments.appointment');
    }

    public function teacherappointment(Request $request)
    {
        $columns = array(
            0 =>'teacher_id',
            1 =>'appointment_date_start',
            2 =>'appointment_date_end',
            3 =>'status',
            4 => 'options'
        );

        $totalData = Appointment::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Appointment::offset($start)
                ->where('teacher_id', Auth::user()->id )
                ->with('appointee')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Appointment::where('teacher_id', Auth::user()->id )
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('appointee')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Appointment::where('teacher_id', Auth::user()->id )
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('appointee')
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['appointee_name'] = $value->appointee->firstname . ' ' . $value->appointee->lastname;
                $nestedData['appointment_date_start'] = $value->appointment_date_start;
                $nestedData['appointment_date_end'] = $value->appointment_date_end;
                $nestedData['status'] = $value->status;
                $btn='';

                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Approve' class='btn btn-default far fa-check approve'></a>";

                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->qr."' title='Decline' class='btn btn-danger decline fas fa-ban'></a>";

                $nestedData['options']=$btn;


                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );

        echo json_encode($json_data);
    }

    public function myappointment(Request $request)
    {
        $columns = array(
            0 =>'teacher_id',
            1 =>'appointment_date_start',
            2 =>'appointment_date_end',
            3 =>'status',
            4 => 'options'
        );

        $totalData = Appointment::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Appointment::offset($start)
                ->where('appointee_id', Auth::user()->id )
                ->with('teacher')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Appointment::where('appointee_id', Auth::user()->id )
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('teacher')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Appointment::where('appointee_id', Auth::user()->id )
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('teacher')
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['teacher_name'] = $value->teacher->firstname . ' ' . $value->teacher->lastname;
                $nestedData['appointment_date_start'] = $value->appointment_date_start;
                $nestedData['appointment_date_end'] = $value->appointment_date_end;
                $nestedData['status'] = $value->status;
                $btn='';

                    $btn.= "<a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Edit' class='btn btn-default far fa-edit edit'></a>";

                    $btn.=  "&nbsp; <a href='javascript:void(0)' data-toggle='tooltip'  data-id='".$value->id."' title='Delete' class='btn btn-danger delete fas fa-trash'></a>";

                $nestedData['options']=$btn;


                $data[] = $nestedData;

            }
        }

        $json_data = array(
            "draw"            => intval($request->input('draw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
            );

        echo json_encode($json_data);
    }
    /*
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppointmentRequest $request)
    {
        $request->user()->appointment()->create($request->all());
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $output = Appointment::where('qr',$id)->get()->all();
        $x=array(
            'a' =>'sample'
        );
        return json_encode($x);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $output = Appointment::where('qr',$id)->get();
    //     return response()->json($output);
    // }
    public function updateStatus($id){
        $update=Appointment::find($id);
        $update->qr=Str::random(40);
        $update->status='Approved';
        $update->save();
        return json_encode(array('statusCode'=>200));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
