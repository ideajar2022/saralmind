<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
        $programs = DB::table('programs')->get();
        return view('backend.program.index')->with('programs',$programs)->with('title','Programs');
    }
}
