<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index($classSlug,$subjectSlug=NULL,$unitSlug=NULL,$lessonSlug=NULL,$noteSlug=NULL)
    {
    	return $classSlug;
    }
}
