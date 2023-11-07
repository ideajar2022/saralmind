<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use App\Models\Blog;

class AboutController extends Controller
{
    public function index(Request $request)
    {
    	return view('frontend.about');
    }
}
