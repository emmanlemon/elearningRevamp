<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Announcement;
use App\Models\Lecture;
use Session;
use DB;

class PagesController extends Controller
{

    public function index($pages){
            $announcements = DB::table('announcements')->latest()->paginate(10);
            $teachers = DB::table('teachers')->latest()->paginate(10);
            $students = DB::table('teachers')
            ->leftJoin('students', 'students.faculty_id' , 'teachers.id')
            ->paginate(10);
    
         $grade1Teachers = DB::table('teachers')
        ->where('grade' , 1)
        ->get();
        
        $grade2Teachers = DB::table('teachers')
       ->where('grade' , 2)
       ->get();

       $grade3Teachers = DB::table('teachers')
      ->where('grade' , 3)
      ->get();

        return view('admin.'.$pages.'.index' , 
        compact('students' ,'teachers' , 'grade1Teachers' , 'grade2Teachers' , 'grade3Teachers' ,'announcements'));

        // }
        // elseif (Session::get('role') == 'teacher')
        // {
        //     dd('teacher');
        //     $students = DB::table('students')->latest()->paginate(10);

        //     $lectures = DB::table('lectures')->where('faculty_id' , Session::get('loginId'))->latest()->paginate(8);
        //     $lessons = DB::table('lessons')->latest()->paginate(10);
    
        //     return view('faculty.'.$pages.'.index' , compact('lectures' , 'lessons','students'));
        // }
        // elseif(Session::get('role') == 'student')
        // {
        //     $lectures = DB::table('lectures')->latest()->paginate(7);
        //     $lessons = DB::table('lessons')
        //     ->leftJoin('teachers', 'teachers.id', '=', 'lessons.faculty_id')
        //     ->where('teachers.grade', $id->grade)
        //     ->orderBy('lessons.id', 'ASC')
        //     ->paginate(8);
        
        
        //     return view('student.'.$pages.'.index', compact('lectures', 'lessons'));
        // }
    
    }

    public function show($id){
        
        $teacher = Teacher::where('id', $id)->first();
        
        if(!empty($id)){
            $students = DB::table('students')
            ->where('faculty_id', $teacher->id)
            ->orderBy('students.id', 'ASC')
            ->paginate(8);
    
            $lectures = DB::table('lectures')
            ->where('faculty_id', $teacher->id)
            ->orderBy('lectures.id', 'ASC')
            ->paginate(8);
    
            $lessons = DB::table('lessons')
            ->where('faculty_id', $teacher->id)
            ->orderBy('lessons.id', 'ASC')
            ->paginate(8);
    
            return view('admin.class.show' , compact('lectures' , 'lessons' , 'students' , 'teacher'));  
        }else{
            return back()->with('error', 'You need to login first');       
        }
             
    }
}
