<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\TeacherRequest;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function allTeachers(Request $request)
    {
        $columns = array(
            0 =>'idnumber',
            1 =>'firstname',
            2 =>'lastname',
            3 =>'email',
            4 => 'options'
        );

        $totalData = Teacher::count();

        $totalFiltered = $totalData;

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {
        $output = Teacher::offset($start)
                ->with('department')
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
        }
        else {
        $search = $request->input('search.value');

        $output =  Teacher::where('rank','LIKE',"%{$search}%")
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

        $totalFiltered = Teacher::where('rank','LIKE',"%{$search}%")
                    ->orWhere('lastname', 'LIKE',"%{$search}%")
                    ->with('department')
                    ->count();
        }

        $data = array();
        if(!empty($output))
        {
            foreach ($output as $value)
            {

                $nestedData['idnumber'] = $value->idnumber;
                $nestedData['firstname'] = $value->firstname;
                $nestedData['lastname'] = $value->lastname;
                $nestedData['email'] = $value->email;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department['data'] = Department::orderby("department","asc")
        			   ->select('id','department')
        			   ->get();

    	return view('teachers.index')->with("department",$department);
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
    public function store(TeacherRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        $request->user()->teacher()->create($request->all());
        return response()->json(['success'=>'Data saved successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response()->json(Teacher::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        Teacher::find($request->id)->update($request->all());

        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Teacher::find($id)->delete();
        return response()->json(['success'=>'Record deleted successfully.']);
    }
}
