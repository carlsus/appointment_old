<?php

namespace App\Http\Controllers;

use App\Appointee;
use App\Http\Requests\AppointeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointeeController extends Controller
{


    public function __construct()
    {
      $this->middleware('guest:appointee', ['except' => ['logout']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('appointees.index');
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
    public function store(AppointeeRequest $request)
    {
        $request['password']=bcrypt($request['password']);
        Appointee::create($request->all());
        return response()->json(['success'=>'Data saved successfully.']);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Appointee  $appointee
     * @return \Illuminate\Http\Response
     */
    public function show(Appointee $appointee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointee  $appointee
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointee $appointee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointee  $appointee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointee $appointee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointee  $appointee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointee $appointee)
    {
        //
    }

    public function showLoginForm()
    {
      return view('appointees.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);


      // Attempt to log the user in
        if (Auth::guard('appointee')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/appointee');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('appointee')->logout();
        return redirect('/appointee');
    }
}
