<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Imports\ImportLessons;
use App\Exports\ExportLessons;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Lesson\StoreLessonRequest;
use App\Http\Requests\Lesson\UpdateLessonRequest;

class LessonsController extends Controller
{
    private $program;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;

    public function __construct(Lesson $lesson, Unit $unit, Program $program, Grade $grade, Subject $subject)
    {
        //$this->middleware('auth:admin');
        $this->program      = $program;
        $this->grade        = $grade;
        $this->subject      = $subject;
        $this->unit         = $unit;
        $this->lesson       = $lesson;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if(!auth()->user()->can('view-lesson'))
        //    abort(403, 'Unauthorized action.');

        $lesson        = $this->lesson->with(['program','grade','subject','unit']);

        if (request()->has('q')) {
            $name           = request('q');
            $lesson        = $lesson->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $lesson        = $lesson->where('program_id',request('program_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $lesson        = $lesson->where('grade_id',request('grade_id'));
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $lesson        = $lesson->where('subject_id',request('subject_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $lesson        = $lesson->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $lesson->latest()->get();
            return Excel::download(new ExportLessons($result), 'lessons.xlsx');
        }
    
        $lessons           = $lesson->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'status'            => request('status'),
        ]);

        $subjects           =   $this->subject->pluck('name','id');
        $programs           =   $this->program->pluck('name','id');
        $grades             =   $this->grade->pluck('name','id');

        return view('frontend.lessons',compact('lessons','programs','subjects','grades'))->with('title','Lessons');
    }
}
