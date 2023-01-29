<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use Session;
use Auth;
use Hash;

class AuthController extends Controller
{

   public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $request -> validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = User::where('username', '=', $request->email)->first();
        $teacher = Teacher::where('faculty_id', '=', $request->email)->first();
        $student = Student::where('student_id', '=', $request->email)->first();
        if($admin)
        {   
            $credentials = $request->only('username', 'password');

            if($request->password ==  $admin->password)
            {
                $request->session()->put(
                   ['loginId'=>$admin->id,
                    'role' => 'admin']
                );
                return redirect('/admin');
            }
            else
            {
                return back()->with('fail', 'Password does not match');
            }
        }
        else if($teacher)
        {
            if($request->password ==  $teacher->password)
            {
                
                $request->session()->put(
                    ['loginId'=> $teacher->id ,
                    'role' => 'teacher']
                );
                return redirect('/teacher');
            }
            else
            {
                return back()->with('fail', 'Password does not match');
            }
        }
        else if($student)
        {
            if($request->password ==  $student->password)
            {
                
                $request->session()->put(
                    ['loginId' => $student->id 
                ,'role'=> 'student']);
                return redirect('/student');
            }
            else
            {
                return back()->with('fail', 'Password does not match');
            }
        }
        else
        {
            return back()->with('fail' ,'This username is not existing');
        }
    }
    
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('/');
        }
      
    }
}
