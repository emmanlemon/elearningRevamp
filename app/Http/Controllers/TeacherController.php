<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lecture;
use Session;
use Hash;
use DB;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        if(Session::has('role') == "teacher")
        {
            $id = Teacher::where('id', '=' ,Session::get('loginId'))->first();
            $lectures = Lecture::all();

            return view('faculty.dashboard', compact('id' , 'lectures'));
        }
        else{
            return redirect('/auth')->with('fail' ,'This is For Teacher Section');
        }
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
            $input = $request->except(['_token']);;
            $input['password'] = hash::make($request->password);
            $input['avatar'] = $request->avatar->getClientOriginalName();
            $request->avatar->move(public_path('images/teacher/avatar'), $input['avatar']);
            $sample = DB::table('teachers')->insert($input);
            return redirect()->back()->with('success', 'New Teacher Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
