<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Note;
use App\Models\NoteSubjectiveQuestion;
use Illuminate\Http\Request;
use DB;

class ImportantQuestionsController extends Controller
{
    private $program;
    private $faculty;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;
    private $note;
    private $noteSubjectiveQuestion;

    public function __construct(Program $program, Faculty $faculty, Grade $grade, Subject $subject, Unit $unit, Lesson $lesson, Note $note, NoteSubjectiveQuestion $noteSubjectiveQuestion)
    {
        $this->program                                  = $program;
        $this->faculty                                  = $faculty;
        $this->grade                                    = $grade;
        $this->subject                                  = $subject;
        $this->unit                                     = $unit;
        $this->lesson                                   = $lesson;
        $this->note                                     = $note;
        $this->noteSubjectiveQuestion                   = $noteSubjectiveQuestion;
    }

    public function getProgram()
    {
        $programs = $this->program->select('id','name','slug','description')->with([
            'faculties' => function ( $query) {
                $query->select('id','program_id','name','slug');
                $query->where('status', 'APPROVED');
                $query->with([
                    'grades' => function ( $query) {
                        $query->select('id','faculty_id','name','slug');
                        $query->where('status', 'APPROVED');
                    }
                ]);
            }
        ])
        ->where(['status'=>'APPROVED'])
        ->orderBy('id','DESC')
        ->get();

        return view('frontend.important-questions.show_programs',compact('programs'));
    }

    public function getFaculty($programSlug){
        $program = $this->program->select('id','name','slug','description','meta_title','meta_description','meta_keyword')->with([
            'faculties' => function ( $query) {
                $query->select('id','program_id','name','slug');
                $query->where('status', 'APPROVED');
            }
        ])
        ->whereSlug($programSlug)
        ->whereStatus('APPROVED')
        ->firstorfail();

        return view('frontend.important-questions.show_faculties',compact('program'));
    }

    // public function getGrade($programSlug, $facultySlug){
    //     $faculty = $this->faculty->select('id','program_id','name','slug','description','image','meta_title','meta_description','meta_keyword')->with([
    //         'grades' => function ( $query) {
    //             $query->select('id','faculty_id','name','slug','image');
    //             $query->where('status', 'APPROVED');
    //         }
    //     ])
    //     ->whereSlug($facultySlug)
    //     ->whereStatus('APPROVED')
    //     ->firstorfail();

    //     return view('frontend.important-questions.show_grades',compact('faculty'));
    // }


    // temporary only for nursing
    public function getGrade(){
        $programSlug = 'nursing';
        $facultySlug = 'pcl-nursing';

        $faculty = $this->faculty->select('id','program_id','name','slug','description','image','meta_title','meta_description','meta_keyword')->with([
            'grades' => function ( $query) {
                $query->select('id','program_id','faculty_id','name','slug','image');
                $query->where('status', 'APPROVED');
            }
        ])
        ->whereSlug($facultySlug)
        ->whereStatus('APPROVED')
        ->firstorfail();

        return view('frontend.important-questions.show_grades',compact('faculty'));
    }

    public function getSubject($programSlug,$facultySlug,$gradeSlug){
        $grade = $this->grade->select('id','program_id','faculty_id','name','slug','image')->with([
            'subjects' => function ( $query) {
                $query->select('id','program_id','faculty_id','grade_id','name','slug','image');
                $query->where('status', 'APPROVED');
            }
        ])
        ->whereSlug($gradeSlug)
        ->whereStatus('APPROVED')
        ->firstorfail();

        return view('frontend.important-questions.show_subjects',compact('grade'));

    }

    public function getLesson($programSlug,$facultySlug,$gradeSlug,$subjectSlug){
        $subject = $this->subject->select('id','program_id','faculty_id','grade_id','name','slug','image')->with([
            'lessons' => function ( $query) {
                $query->select('id','program_id','faculty_id','grade_id','subject_id','name','slug','image');
                $query->where('status', 'APPROVED');
            }
        ])
        ->whereSlug($subjectSlug)
        ->whereStatus('APPROVED')
        ->firstorfail();

        return view('frontend.important-questions.show_lessons',compact('subject'));
    }

    public function getSubjectiveQuestion($programSlug,$facultySlug,$gradeSlug,$subjectSlug,$lessonSlug){

        $lesson = $this->lesson->where('slug',$lessonSlug)->select('id','program_id','faculty_id','grade_id','subject_id','name')->first();
        
        $note_ids = $this->note->where('lesson_id',$lesson->id)->pluck('id');

        $exercises = $this->noteSubjectiveQuestion->select('question','marks','type')
        ->whereIn('note_id', $note_ids->toArray())
        ->whereStatus('APPROVED')
        ->get();

        return view('frontend.important-questions.show_exercises',compact('exercises','lesson'));

    }

}
