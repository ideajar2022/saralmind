<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Note;
use DB;

class GradeController extends Controller
{
    private $grade;
    private $program;

    public function __construct(Program $program, Faculty $faculty, Grade $grade)
    {
        $this->program      = $program;
        $this->faculty      = $faculty;
        $this->grade        = $grade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $faculties        = $this->grade->latest()->paginate(6); 
        $faculties           = $this->faculty->where('status','APPROVED')->latest()->paginate(6);       
        // $grades           = $this->grade->latest()->paginate(6);       

        return view('frontend.courseoverview',compact('faculties'))->with('title','Faculties');
    }
}