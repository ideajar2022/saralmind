<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Note;
use Illuminate\Http\Request;
use DB;

class SyllabusController extends Controller
{
	private $program;
	private $faculty;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;
    private $note;

    public function __construct(Program $program, Faculty $faculty, Grade $grade, Subject $subject, Unit $unit, Lesson $lesson, Note $note)
    {
        $this->program      		= $program;
        $this->faculty      		= $faculty;
        $this->grade        		= $grade;
        $this->subject      		= $subject;
        $this->unit         		= $unit;
        $this->lesson       		= $lesson;
        $this->note         		= $note;
    }

    public function getProgram()
    {
    	return "Faculty";
    }

    public function getFaculties($programSlug)
    {
    	$program = $this->program->select('id','name','slug','description','meta_title','meta_description','meta_keyword')->with([
		    'faculties' => function ( $query) {
		    	$query->select('id','program_id','name','slug');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereSlug($programSlug)
		->whereStatus('APPROVED')
		->firstorfail();

		return view('frontend.faculty.index',compact('program'));
    }

    public function getGrades($programSlug,$facultySlug)
    {
    	$faculty = $this->faculty->select('id','program_id','name','slug','description','image','meta_title','meta_description','meta_keyword')->with([
		    'grades' => function ( $query) {
		    	$query->select('id','faculty_id','name','slug','image');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereSlug($facultySlug)
		->whereStatus('APPROVED')
		->firstorfail();

		return view('frontend.grade.index',compact('faculty'));
    }

    public function getSubjects($programSlug,$facultySlug,$gradeSlug)
    {
    	$grade = $this->grade->select('id','program_id','faculty_id','name','slug','description','meta_title','meta_description','meta_keyword','image')->with([
		    'subjects' => function ( $query) {
		    	$query->select('id','grade_id','name','slug','image');
		        $query->where('status', 'APPROVED');
		    }
		])
		->whereSlug($gradeSlug)
		->whereStatus('APPROVED')
		->firstorfail();

		return view('frontend.subject.index',compact('grade'));
    }

    public function getSyllabus($programSlug,$facultySlug,$gradeSlug,$subjectSlug)
    {
	    $subject = $this->subject->where('slug',$subjectSlug)->first();

    	$grade = $this->grade->select('id','program_id','faculty_id','name','slug')->with([
		    'subjects' => function ( $query) use ($subjectSlug) {
		    	$query->select('id','grade_id','name','slug','description','meta_title','meta_description','meta_keyword');
		        $query->where(['slug'=>$subjectSlug,'status'=>'APPROVED']);

		        $query->with([
				    'units' => function ( $query) {
				    	$query->select('id','subject_id','name','slug');
				        $query->where(['status'=>'APPROVED']);

				        $query->with([
						    'lessons' => function ( $query){
						    	$query->select('id','subject_id','unit_id','name','slug');
						        $query->where(['status'=>'APPROVED'])->orderBy('order','ASC');
						         $query->withCount([
								    'notes' => function ( $query){
								        $query->where(['status'=>'APPROVED']);

								    }
								]);
						        $query->with([
								    'notes' => function ( $query){
								    	$query->select('id','subject_id','unit_id','lesson_id','title','slug','image');
								        $query->where(['status'=>'APPROVED'])->orderBy('order','ASC');
								        $query->withCount([
										    'videos' => function ( $query){
										        $query->where(['status'=>'APPROVED']);
										    }
										]);
										$query->withCount([
										    'mcqs' => function ( $query){
										        $query->where(['status'=>'APPROVED']);
										    }
										]);
										$query->withCount([
										    'exercises' => function ( $query){
										        $query->where(['status'=>'APPROVED']);
										    }
										]);
										
								    }
								]);

						    }
						]);
				    }
				]);

				$query->withCount([
				    'lessons as lessons_count' => function ( $query){
				        $query->where(['status'=>'APPROVED']);
				   }
				]);

				$query->with([
				    'lessons' => function ( $query){
				    	$query->select('id','subject_id','unit_id','name','slug');
				        $query->where(['status'=>'APPROVED'])->orderBy('order','ASC');
				        $query->withCount([
						    'notes' => function ( $query){
						        $query->where(['status'=>'APPROVED']);

						    }
						]);
				        $query->with([
						    'notes' => function ( $query){
						    	$query->select('id','subject_id','unit_id','lesson_id','title','slug','image');
						        $query->where(['status'=>'APPROVED'])->orderBy('order','ASC');
						        $query->withCount([
								    'videos' => function ( $query){
								        $query->where(['status'=>'APPROVED']);
								    }
								]);
								$query->withCount([
								    'mcqs' => function ( $query){
								        $query->where(['status'=>'APPROVED']);
								    }
								]);
								$query->withCount([
								    'exercises' => function ( $query){
								        $query->where(['status'=>'APPROVED']);
								    }
								]);
						    }
						]);
				    }
				]);
		    }
		])
		->whereHas('subjects', function($query) use ($subjectSlug) {
            $query->where(['slug'=>$subjectSlug,'status'=>'APPROVED']);
        })
		->whereSlug($gradeSlug)
		->whereStatus('APPROVED')
		->firstorfail();

		return view('frontend.syllabus.index',compact('grade','subject'));
    }

    public function getLesson($programSlug,$facultySlug,$gradeSlug,$subjectSlug,$lessonSlug)
    {
    	$lesson = $this->lesson->with(['program','faculty','grade','subject','unit'])
            ->with([
			    'notes' => function ( $query){
			    	$query->select('id','subject_id','unit_id','lesson_id','title','slug','summary','image');
			        $query->where(['status'=>'APPROVED'])->orderBy('order', 'ASC');
			        $query->withCount([
					    'videos' => function ( $query){
					        $query->where(['status'=>'APPROVED']);
					    }
					]);
					$query->withCount([
					    'mcqs' => function ( $query){
					        $query->where(['status'=>'APPROVED']);
					    }
					]);
					$query->withCount([
					    'exercises' => function ( $query){
					        $query->where(['status'=>'APPROVED']);
					    }
					]);
			    }
			])
            ->withCount([
			    'notes' => function ( $query){
			        $query->where(['status'=>'APPROVED']);
			    }
			])
			->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
            ->whereHas('notes', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->whereSlug($lessonSlug)
			->whereStatus('APPROVED')
			->orderBy('order', 'ASC')
			->firstorfail();

		return view('frontend.lesson.index',compact('lesson'));
    }

    public function getNote($programSlug,$facultySlug,$gradeSlug,$subjectSlug,$lessonSlug,$noteSlug)
    {
    	$noteQuery = $this->note
					    ->whereHas('program', function($query) {
					        $query->where(['status'=>'APPROVED']);
					    })
					    ->whereHas('faculty', function($query) {
					        $query->where(['status'=>'APPROVED']);
					    })
					    ->whereHas('grade', function($query) {
					        $query->where(['status'=>'APPROVED']);
					    })
					    ->whereHas('subject', function($query) {
					        $query->where(['status'=>'APPROVED']);
					    })
					    ->whereHas('lesson', function($query) {
					        $query->where(['status'=>'APPROVED']);
					    })
					    ->whereSlug($noteSlug)
					    ->orderBy('order','ASC');

		if(request()->query('admin') != true) {
		    $noteQuery->where('status', 'APPROVED');
		}	
		
		$note = $noteQuery->firstOrFail();		    

		return view('frontend.note.index',compact('note'));

    }

    public function remapClass($classId)
    {
    	$grade = $this->grade
	    	->whereId($classId)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect()->route('class',[
			$grade->program->slug,
			$grade->faculty->slug,
			$grade->slug
		]);
    }

    public function remapSubject($classSlug, $subjectSlug)
    {
    	$subject = $this->subject->with(['program','faculty','grade'])
			->whereHas('program', function($query) {
	            $query->where(['status'=>'APPROVED']);
	        })
			->whereHas('faculty', function($query) {
	            $query->where(['status'=>'APPROVED']);
	        })
    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->where('slug',$subjectSlug)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect()->route('syllabus',[
			$subject->program->slug,
			$subject->faculty->slug,
			$subject->grade->slug,
			$subject->slug
		]);
    }

    public function remapLesson($classSlug, $subjectSlug, $lessonSlug)
    {
    	$lesson = $this->lesson->with(['program','faculty','grade','subject'])
			->whereHas('program', function($query) {
	            $query->where(['status'=>'APPROVED']);
	        })
    		->whereHas('faculty', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->where('slug',$lessonSlug)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect()->route('lesson',[
			$lesson->program->slug,
			$lesson->faculty->slug,
			$lesson->grade->slug,
			$lesson->subject->slug,
			$lesson->slug
		]);
    }

    public function remapNote($subjectSlug, $lessonSlug, $noteSlug)
    {
    	$note = $this->note->with(['program','faculty','grade','subject','lesson'])
			->whereHas('program', function($query) {
	            $query->where(['status'=>'APPROVED']);
	        })
			->whereHas('faculty', function($query) {
	            $query->where(['status'=>'APPROVED']);
	        })
    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
            ->whereHas('lesson', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->where('slug',$noteSlug)
			->whereStatus('APPROVED')
			->firstorfail();

		$current_url = url()->current();

		if(strpos($current_url, 'pcl-3-rd-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-3-rd-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'class-pcl-3-rd-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-3-rd-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'pcl-2nd-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-2nd-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'class-pcl-2nd-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-2nd-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'pcl-1st-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-1st-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'class-pcl-1st-year') !== false){
			return redirect()->route('note',[
				'nursing',
				'pcl-nursing',
				'pcl-1st-year',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}


		if(strpos($current_url, 'bba-first-year-semester-i') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-first-year-semester-i',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-first-year-semester-ii') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-first-year-semester-ii',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-second-year-semester-i') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-second-year-semester-i',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-second-year-semester-ii') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-second-year-semester-ii',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-third-year-semester-i') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-third-year-semester-i',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-third-year-semester-ii') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-third-year-semester-ii',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-fourth-year-semester-i') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-fourth-year-semester-i',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		if(strpos($current_url, 'bba-fourth-year-semester-ii') !== false){
			return redirect()->route('note',[
				'school-of-management',
				'bba-bachelors-in-business-administration',
				'bba-fourth-year-semester-ii',
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}

		else{
			return redirect()->route('note',[
				$note->program->slug,
				$note->faculty->slug,
				$note->grade->slug,
				$note->subject->slug,
				$note->lesson->slug,
				$note->slug
			]);
		}
    }

    public function remapNoteExercises($noteId)
    {
    	$note = $this->note->with(['grade','subject','lesson'])

    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
            ->whereHas('lesson', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->whereId($noteId)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect($note->grade->slug.'/'.
			$note->subject->slug.'/'.
			$note->lesson->slug.'/'.
			$note->slug.'?type=exercise');
    }

    public function remapNoteVideos($noteId)
    {
    	$note = $this->note->with(['grade','subject','lesson'])

    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
            ->whereHas('lesson', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->whereId($noteId)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect($note->grade->slug.'/'.
			$note->subject->slug.'/'.
			$note->lesson->slug.'/'.
			$note->slug.'?type=video');
    }

    public function remapNoteQuizs($noteId)
    {
    	$note = $this->note->with(['grade','subject','lesson'])

    		->whereHas('grade', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
    		->whereHas('subject', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
            ->whereHas('lesson', function($query) {
                $query->where(['status'=>'APPROVED']);
            })
	    	->whereId($noteId)
			->whereStatus('APPROVED')
			->firstorfail();

		return redirect($note->grade->slug.'/'.
			$note->subject->slug.'/'.
			$note->lesson->slug.'/'.
			$note->slug.'?type=quiz');
    }

}