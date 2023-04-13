<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Session;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

            $lecture = new Lesson;
            $lecture->faculty_id = Session::get('loginId');
            $lecture->title = $request->input('title');
            $lecture->link = $request->input('link');
            $lecture->description = $request->input('description');

            $fileNameFile = $request->file->getClientOriginalName();
            $filePathFile = 'files/' . $fileNameFile;
            $request->file->move(public_path('files/'), $fileNameFile);
            $lecture->file = $filePathFile;

            $fileNameImage = $request->thumbnailImage->getClientOriginalName();
            $filePathImage = 'images/teacher/thumbnailImage/' . $fileNameImage;
            $request->thumbnailImage->move(public_path('images/teacher/thumbnailImage/'), $fileNameImage);
            $lecture->thumbnailImage = $filePathImage;
            $lecture->save();

            return redirect()->back()->with('success', 'New Lesson Added Successfully');
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
    {
        $lesson = Lesson::findOrFail($id);
        $lesson->faculty_id = $request->faculty_id;
        $lesson->title = $request->title;
        $lesson->link = $request->link;
        $lesson->description = $request->description;

        $fileNameFile = $request->file->getClientOriginalName();
        $filePathFile = 'files/' . $fileNameFile;
        $request->file->move(public_path('files/'), $fileNameFile);
        $lesson->file = $filePathFile;

        $fileNameImage = $request->thumbnailImage->getClientOriginalName();
        $filePathImage = 'images/teacher/thumbnailImage/' . $fileNameImage;
        $request->thumbnailImage->move(public_path('images/teacher/thumbnailImage/'), $fileNameImage);
        $lesson->thumbnailImage = $filePathImage;
        $lesson->save();

        return redirect()->back()->with('update', 'Lesson Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::where('id', $id)->delete();
        return back()->with('delete', ' Lesson Deleted Successfully');   
    }
}
