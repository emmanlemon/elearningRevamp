<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lecture;
use DB;

class PageController extends Controller
{
    public function index($pages){
        $lectures = DB::table('lectures')->latest()->paginate(8);

        return view('faculty.'.$pages.'.index' , compact('lectures'));

    }
}
