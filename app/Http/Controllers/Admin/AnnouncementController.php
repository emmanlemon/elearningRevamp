<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Announcement;
use DB; 

class AnnouncementController extends Controller
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
        Announcement::create([
            'created_at' => $request->created_at,
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'thumbnailImage' => $request->thumbnailImage->getClientOriginalName(),
        ]);
        $fileNameImage = $request->thumbnailImage->getClientOriginalName();
        $filePathImage = 'images/teacher/thumbnailImage/' . $fileNameImage;
        $request->thumbnailImage->move(public_path('images/teacher/thumbnailImage/'), $fileNameImage);
        return redirect()->back()->with('success', 'New Announcement Added Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     dd($id);   
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
        DB::table('announcements')->where('id', $id)->delete();
        return back()->with('delete', ' Announcement Deleted Successfully');       }
}
