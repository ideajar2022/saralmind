<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\Blog;

class SitemapController extends Controller
{
	private $program;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;
    private $note;

    public function __construct(Program $program, Grade $grade, Subject $subject, Unit $unit, Lesson $lesson, Note $note)
    {
        $this->program      = $program;
        $this->grade        = $grade;
        $this->subject      = $subject;
        $this->unit         = $unit;
        $this->lesson       = $lesson;
        $this->note         = $note;
    }

   	public function index() {
      	return response()->view('frontend.sitemap.index')
      		->header('Content-Type', 'text/xml');
    }

    public function grades() {
		$grades = Grade::select('slug','created_at')->whereStatus('APPROVED')->latest()->get();

		return response()->view('frontend.sitemap.grades', [
		'grades' => $grades,
		])->header('Content-Type', 'text/xml');
   	}

	public function subjects() {
	   $subjects = Subject::select('grade_id','slug','created_at')->whereStatus('APPROVED')->with('grade')->latest()->get();
	   return response()->view('frontend.sitemap.subjects', [
	       'subjects' => $subjects,
	   ])->header('Content-Type', 'text/xml');
	}

	public function lessons() {
	   $lessons = Lesson::select('grade_id','subject_id','slug','created_at')->whereStatus('APPROVED')->with('subject.grade')->latest()->get();
	   return response()->view('frontend.sitemap.lessons', [
	       'lessons' => $lessons,
	   ])->header('Content-Type', 'text/xml');
	}

	public function notes() {
	   $notes = Note::select('grade_id','subject_id','lesson_id','slug','created_at')->whereStatus('APPROVED')->with(['grade','subject','lesson'])->latest()->get();
	   return response()->view('frontend.sitemap.notes', [
	       'notes' => $notes,
	   ])->header('Content-Type', 'text/xml');
	}

	public function blogs() {
	   $blogs = Blog::select('slug','created_at')->whereStatus('APPROVED')->latest()->get();
	   return response()->view('frontend.sitemap.blogs', [
	       'blogs' => $blogs,
	   ])->header('Content-Type', 'text/xml');
	}

}
