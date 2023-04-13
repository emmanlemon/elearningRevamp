<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Lecture;
use App\Models\Question;
use Session;
use DB;
use Auth;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faculty.lecture.index');
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

            $lecture = new Lecture;
            $lecture->faculty_id = Session::get('loginId');
            $lecture->title = $request->input('title');
            $lecture->link = $request->input('link');
            $lecture->shortDescription = $request->input('shortDescription');
            $lecture->description = $request->input('description');
            
            //Uploading Video
            // $fileName = $request->video->getClientOriginalName();
            // $filePath = 'videos/' . $fileName;
    
            // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->video));
    
            // // File URL to access the video in frontend
            // $url = Storage::disk('public')->url($filePath);
            // $lecture->path = $filePath;

            // //Uploading File
            // $fileName = $request->file->getClientOriginalName();
            // $filePath = 'files/' . $fileName;
    
            // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->file));
    
            // // File URL to access the video in frontend
            // $url = Storage::disk('public')->url($filePath);
            // $lecture->file = $filePath;

            // //Uploading Image
            // $fileName = $request->thumbnailImage->getClientOriginalName();
            // $filePath = 'images/teacher/thumbnailImage' . $fileName;
    
            // $isFileUploaded = Storage::disk('public')->put($filePath, file_get_contents($request->thumbnailImage));
    
            // // File URL to access the video in frontend
            // $url = Storage::disk('public')->url($filePath);
            // $lecture->thumbnailImage = $filePath;

            $fileNameVideo = $request->video->getClientOriginalName();
            $filePathVideo = 'videos/' . $fileNameVideo;
            $request->video->move(public_path('videos/'), $fileNameVideo);
            $lecture->path = $filePathVideo;

            $fileNameFile = $request->file->getClientOriginalName();
            $filePathFile = 'files/' . $fileNameFile;
            $request->file->move(public_path('files/'), $fileNameFile);
            $lecture->file = $filePathFile;

            $fileNameImage = $request->thumbnailImage->getClientOriginalName();
            $filePathImage = 'images/teacher/thumbnailImage/' . $fileNameImage;
            $request->thumbnailImage->move(public_path('images/teacher/thumbnailImage/'), $fileNameImage);
            $lecture->thumbnailImage = $filePathImage;
            $lecture->save();

            return redirect()->back()->with('success', 'New Lecture Added Successfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        

        if(Session::get('role') == 'teacher'){ 
            $question1 = DB::table('questions')
            ->where('questions.lecture_id' , $id)
            ->where('question1' , 1)
            ->count();
            $question2 = DB::table('questions')
            ->where('questions.lecture_id' , $id)
            ->where('question2' , 1)
            ->count();
            $question3 = DB::table('questions')
            ->where('questions.lecture_id' , $id)
            ->where('question3' , 1)
            ->count();
            $question4 = DB::table('questions')
             ->where('questions.lecture_id' , $id)
            ->where('question4' , 1)
            ->count();
            $question5 = DB::table('questions')
            ->where('questions.lecture_id' , $id)
            ->where('question5' , 1)
            ->count();
            
            // $question = DB::table('questions') 
            // ->select($column )
            // ->where('questions.lecture_id' , $id)
            // ->get();

            $respondent = DB::table('questions')
            ->where('questions.lecture_id' , $id)
            ->count('questions.student_id');

            $lecture = Db::table('lectures')->where('id', $id)->get();
            return view('faculty.lecture.show' ,compact('lecture' , 'question1','question2','question3','question4','question5' , 'respondent'
        ));
        }else{
            $user = DB::table('students')->where('id', '=' ,Session::get('loginId'))->first();

            $lecture = Db::table('lectures')
                       ->where('id', $id)->get();
            return view('student.lecture.show' ,compact('lecture' , 'user'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lecture = Lecture::findOrFail($id);
        $grade->course_code = $request->input('course_code2');
        $grade->description = $request->input('description2');
        $grade->save();
        return redirect('/admin/grade-level')->with('success','Grade Level Successfully Updated!');
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
        $lecture = Lecture::findOrFail($id);
        $lecture->faculty_id = Session::get('loginId');
        $lecture->title = $request->title;
        $lecture->link = $request->link;
        $lecture->shortDescription = $request->shortDescription;
        $lecture->description = $request->description;

        $fileNameVideo = $request->video->getClientOriginalName();
        $filePathVideo = 'videos/' . $fileNameVideo;
        $request->video->move(public_path('videos/'), $fileNameVideo);
        $lecture->path = $filePathVideo;
        
        $fileNameFile = $request->file->getClientOriginalName();
        $filePathFile = 'files/' . $fileNameFile;
        $request->file->move(public_path('files/'), $fileNameFile);
        $lecture->file = $filePathFile;

        $fileNameImage = $request->thumbnailImage->getClientOriginalName();
        $filePathImage = 'images/teacher/thumbnailImage/' . $fileNameImage;
        $request->thumbnailImage->move(public_path('images/teacher/thumbnailImage/'), $fileNameImage);
        $lecture->thumbnailImage = $filePathImage;
        $lecture->save();

        return redirect()->back()->with('update', 'Lecture Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lectures')->where('id', $id)->delete();
        return redirect('teacher/lecture')->with('delete', ' Lecture Deleted Successfully');   
    }
}
