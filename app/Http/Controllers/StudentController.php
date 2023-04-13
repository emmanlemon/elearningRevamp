<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Requests\StudentRequest;
use App\Models\Student;
use Session;
use DB;
use Hash;
use Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = array();
        if(Session::get('role') == "student")
        {
            $id = DB::table('students')
            ->leftJoin('teachers', 'teachers.id' , 'students.faculty_id')
            ->where('students.id', '=' ,Session::get('loginId'))
            ->first();

            $lecture = DB::table('lectures')
            ->leftJoin('teachers', 'teachers.id', '=', 'lectures.faculty_id')
            ->where('teachers.faculty_id', $id->faculty_id)
            ->first();

            $lesson = DB::table('lessons')
            ->leftJoin('teachers', 'teachers.id', '=', 'lessons.faculty_id')
            ->where('teachers.faculty_id', $id->faculty_id)
            ->first();
            
            return view('student.dashboard', compact('id' , 'lecture' , 'lesson'));
        }
        else{
            return redirect('/auth')->with('fail' ,'This is For Student Section');
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
                    'student_id' => 'unique:students| unique:teachers,faculty_id',
                        'email' => 'unique:students| unique:teachers',
                );
        $message = array(
            'student_id' => 'Student Id is already taken'
        );
        $validator = Validator::make($data,$rule,$message);
        if($validator->fails())
        {
            return back()
                    ->withErrors($validator)
                    ->withInput($request->all())
                    ->with('fail', 'Student Registration Failed');
            }else
            {
            $student = new Student();
            $student->student_id = $request->input('student_id'); 
            $student->firstname = $request->input('firstname');
            $student->middlename = $request->input('middlename');
            $student->lastname = $request->input('lastname');
            $student->age = $request->input('age');
            $student->email =  $request->input('email');
            $student->contact =  $request->input('contact');
            $student->address = $request->input('address'); 
            $student->gender =  $request->input('gender');
            $student->password = Hash::make($request->input('student_id'));
            $student->faculty_id = $request->input('faculty_id');
            $student->save();
            return redirect()->back()->with('success', 'New Student Added Successfully');
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
        $data  = $request->except('_password');
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
            $student = Student::findOrFail($id);
            $student->student_id = $request->input('student_id'); 
            $student->firstname = $request->input('firstname');
            $student->middlename = $request->input('middlename');
            $student->lastname = $request->input('lastname');
            $student->age = $request->input('age');
            $student->email =  $request->input('email');
            $student->contact =  $request->input('contact');
            $student->address = $request->input('address'); 
            $student->gender =  $request->input('gender');
            $student->password = Hash::make($request->input('student_id'));
            $student->save();
            return redirect()->back()->with('update', 'Student Update Successfully');
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
        Student::where('id', $id)->delete();
        return back()->with('delete', 'Student Deleted Successfully');   
    }
}
