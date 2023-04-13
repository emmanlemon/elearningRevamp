<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Lecture;
use App\Models\Lesson;
use App\Models\Student;
use Session;
use Hash;
use DB;
use Validator;


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
        if(Session::get('role') == "teacher")
        {
            $id = Teacher::where('id', '=' ,Session::get('loginId'))->first();
            $lectures = Lecture::where('faculty_id', '=' ,Session::get('loginId'));
            $lessons = Lesson::where('faculty_id', '=' ,Session::get('loginId'));
            $students = Student::where('faculty_id', '=' ,Session::get('loginId'));


            return view('faculty.dashboard', compact('id' , 'lectures' ,'lessons' ,'students'));
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
        $data  = $request->except('_password');
        $rule  = array(
                    'faculty_id' => 'unique:students| unique:teachers,faculty_id',
                        'email' => 'unique:students| unique:teachers',
                );
        $message = array(
            'faculty_id' => 'Faculty Id is already taken'
        );
        $validator = Validator::make($data,$rule,$message);
        if($validator->fails())
        {
            return back()
                    ->withErrors($validator)
                    ->withInput($request->all())
                    ->with('fail', 'Teacher Registration Failed');
            }else
            {
                $teacher = new Teacher();
                $teacher->faculty_id = $request->input('faculty_id'); 
                $teacher->firstname = $request->input('firstname');
                $teacher->middlename = $request->input('middlename');
                $teacher->lastname = $request->input('lastname');
                $teacher->email =  $request->input('email');
                $teacher->contact =  $request->input('contact');
                $teacher->address = $request->input('address'); 
                $teacher->gender =  $request->input('gender');
                $teacher->password = Hash::make($request->input('faculty_id'));
                $teacher->grade =  $request->input('grade');
                $teacher->subject = $request->input('subject');
                $teacher->save();
                // $input = $request->except(['_token']);;
                // $input['password'] = hash::make($request->password);
                // $sample = DB::table('teachers')->insert($input);
                return redirect()->back()->with('success', 'New Teacher Added Successfully');
            }
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
    { $data  = $request->except('_password');
        $rule  = array(
                        'email' => 'unique:students| unique:teachers',
                );
        $validator = Validator::make($data,$rule);
        if($validator->fails()){
            return back()
                    ->withErrors($validator)
                    ->withInput($request->all())
                    ->with('fail', 'Student Registration Failed');
            }else
            {
    $teacher = Teacher::findOrFail($id);
    $teacher->faculty_id = $request->input('faculty_id');
    $teacher->firstname = $request->input('firstname');
    $teacher->middlename = $request->input('middlename');
    $teacher->lastname = $request->input('lastname');
    $teacher->email =  $request->input('email');
    $teacher->contact =  $request->input('contact');
    $teacher->address = $request->input('address');
    $teacher->gender =  $request->input('gender');
    $teacher->grade =  $request->input('grade');
    $teacher->subject = $request->input('subject');
    $teacher->save();

    return redirect()->back()->with('update', 'Teacher Update Successfully');
}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('teachers')->where('id', $id)->delete();
        return back()->with('delete', ' Teacher Data Deleted Successfully');   
    }
}
