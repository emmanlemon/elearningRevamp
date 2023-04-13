<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Student;
use Session;

class QuestionController extends Controller
{

    public function index(Request $request){
    $student = Student::where('id', '=' ,Session::get('loginId'))->first();

    $existingVote = Question::where('lecture_id',$request->lecture_id)->where('student_id', $student->id)->first();
    if ($existingVote) {
        return redirect()->back()->with('error', 'You have already answered on this question.'); 
    }
        Question::create($request->all());
        return redirect()->back()->with('success', 'Thank You For Your Response');
    }
}
