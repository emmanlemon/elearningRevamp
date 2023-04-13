<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Lecture;
use DB;
use Session;

class PageController extends Controller
{
    public function index($pages){
        $announcements = DB::table('announcements')->latest()->paginate(10);
        $id = Teacher::where('id', '=' ,Session::get('loginId'))->first();

        $students = DB::table('students')
        ->where('faculty_id', $id->id)
        ->orderBy('students.id', 'ASC')
        ->paginate(8);
        
        $lectures = Db::table('lectures')
        ->where('faculty_id', $id->id)
        ->orderBy('lectures.id', 'ASC')
        ->paginate(8);

        $lessons = DB::table('lessons')
        ->where('faculty_id', $id->id)
        ->orderBy('lessons.id', 'ASC')
        ->paginate(8);
    
        return view('faculty.'.$pages.'.index' , compact('lectures' , 'lessons' , 'students' , 'id','announcements'));
        

            // $lectures = DB::table('lectures')->latest()->paginate(7);
            // $lessons = DB::table('lessons')
            // ->leftJoin('teachers', 'teachers.id', '=', 'lessons.faculty_id')
            // ->where('teachers.grade', $id->grade)
            // ->orderBy('lessons.id', 'ASC')
            // ->paginate(8);
    }
}
