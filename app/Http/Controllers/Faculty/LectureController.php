<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Lecture;
use Session;
use DB;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('faculty.lecture.index' );
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
        $lecture = Db::table('lectures')->where('id', $id)->get();
        return view('faculty.lecture.show' ,compact('lecture'));
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
