<?php

namespace App\Http\Controllers;

use App\Appointment;
use Illuminate\Http\Request;

class QrScanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('scan.index');
    }

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $output = Appointment::where('qr',$id)->with('teacher')->with('appointee')->first();
        // if  ($output->appointment_date_start <= Carbon::now('ASIA/Manila') && $output->appointment_date_end>=Carbon::now('ASIA/Manila')  ) {
                return json_encode($output);
        //     }else {
        //         return json_encode(null);
        //     }


        // //dd(Carbon::now('ASIA/Manila')->toDateTimeString() );
        // dd($output->appointment_date_start->toDateTimeString()  );
        // $x=array(
        //     'id' => $output->id,
        //     'teacher_name' => $output->teacher->firstname . ' ' . $output->teacher->lastname,
        //     'appointee_name' => $output->appointee->firstname . ' ' . $output->appointee->lastname,
        //     'appointment_time' => $output->appointment_date_start . ' ' . $output->appointment_date_end
        // );
        //     dd($output->appointment_date_start);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
