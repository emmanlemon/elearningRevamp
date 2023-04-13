<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Session;
use DB;

class StudentPagesController extends Controller
{
    public function index($pages){
        $announcements = DB::table('announcements')->latest()->paginate(10);
        $id = DB::table('students')->where('id', '=' ,Session::get('loginId'))->first();

            
            $lectures = DB::table('lectures')
            ->where('faculty_id', $id->faculty_id)
            ->orderBy('lectures.id', 'ASC')
            ->paginate(8);

            $lessons = DB::table('lessons')
            ->leftJoin('teachers', 'teachers.id', '=', 'lessons.faculty_id')
            ->where('teachers.id', $id->faculty_id)
            ->orderBy('lessons.id', 'ASC')
            ->paginate(8);
        
            return view('student.'.$pages.'.index', compact('lectures', 'lessons','announcements'));

    }
}
