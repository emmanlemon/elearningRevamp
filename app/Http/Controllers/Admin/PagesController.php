<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Student;
use DB;

class PagesController extends Controller
{
    public function index($pages){
        $teachers = DB::table('teachers')->latest()->paginate(5);
        $students = DB::table('students')->latest()->paginate(10);

        $column = [
            DB::raw('faculty_id AS facultyId'),
            DB::raw('firstname AS firstname'),
            DB::raw('middlename AS middlename'),
            DB::raw('lastname AS lastname'),
            DB::raw('grade AS grade'),
            DB::raw('subject AS subject'),
        ];    

         $grade1Teachers = DB::table('teachers')
         ->select($column)
        ->where('grade' , 1)
        ->get();
        
        $grade2Teachers = DB::table('teachers')
        ->select($column)
       ->where('grade' , 2)
       ->get();
      

       $grade3Teachers = DB::table('teachers')
       ->select($column)
      ->where('grade' , 3)
      ->get();

        return view('admin.'.$pages.'.index' , 
        compact('students' , 'teachers' , 'grade1Teachers' , 'grade2Teachers' , 'grade3Teachers'));
    }
}
