<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Faculty;
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
    private $faculty;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;

    public function __construct(Lesson $lesson, Unit $unit, Program $program, Faculty $faculty, Grade $grade, Subject $subject)
    {
        $this->middleware('auth:admin');
        $this->program      = $program;
        $this->faculty      = $faculty;
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
        if(!auth()->user()->can('view-lesson'))
            abort(403, 'Unauthorized action.');
       
        $lesson        = $this->lesson->with(['program','faculty','grade','subject','unit']);

        if (request()->has('q')) {
            $name           = request('q');
            $lesson        = $lesson->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $lesson        = $lesson->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $lesson        = $lesson->where('faculty_id',request('faculty_id'));
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
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'status'            => request('status'),
        ]);

        $subjects           =   $this->subject->pluck('name','id');
        $programs           =   $this->program->pluck('name','id');
        $faculties           =   $this->faculty->pluck('name','id');
        $grades             =   $this->grade->pluck('name','id');

        return view('backend.lesson.index',compact('lessons','programs','faculties','subjects','grades'))->with('title','Lessons');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-lesson'))
            abort(403, 'Unauthorized action.');
        $lesson         = $this->lesson;
        $programs       = $this->program->pluck('name','id');

        return view('backend.lesson.create',compact('programs','lesson'))->with('title','Create Lesson');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLessonRequest $request)
    {
        if(!auth()->user()->can('create-lesson'))
            abort(403, 'Unauthorized action.');

        $this->lesson->name                   = $request->name;
        $this->lesson->slug                   = $request->slug;
        $this->lesson->image                  = $request->image;
        $this->lesson->description            = $request->description;
        $this->lesson->order                  = $request->order;
        $this->lesson->status                 = $request->status;
        $this->lesson->program_id             = $request->program_id;
        $this->lesson->faculty_id             = $request->faculty_id;
        $this->lesson->grade_id               = $request->grade_id;
        $this->lesson->subject_id             = $request->subject_id;
        $this->lesson->unit_id                = $request->unit_id;
        $this->lesson->created_by             = auth()->id();
        $this->lesson->meta_keyword           = $request->meta_keyword;
        $this->lesson->meta_title             = $request->meta_title;
        $this->lesson->meta_description       = $request->meta_description;
        
        if( $this->lesson->save() ){
            session()->flash('success','Lesson Created');
            return redirect()->route('lesson.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('edit-lesson'))
            abort(403, 'Unauthorized action.');

        $lesson        = $this->lesson->find($id);
    
        $programs      = $this->program->pluck('name','id');

        return view('backend.lesson.edit',compact('programs','lesson'))->with('title','Edit Lesson');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLessonRequest $request, $id)
    {
        if(!auth()->user()->can('edit-lesson'))
            abort(403, 'Unauthorized action.');

        $lesson                         = $this->lesson->find($id);

        $lesson->name                   = $request->name;
        $lesson->slug                   = $request->slug;
        $lesson->image                  = $request->image;
        $lesson->description            = $request->description;
        $lesson->order                  = $request->order;
        $lesson->status                 = $request->status;
        $lesson->program_id             = $request->program_id;
        $lesson->faculty_id             = $request->faculty_id;
        $lesson->grade_id               = $request->grade_id;
        $lesson->subject_id             = $request->subject_id;
        $lesson->unit_id                = $request->unit_id;
        $lesson->meta_keyword           = $request->meta_keyword;
        $lesson->meta_title             = $request->meta_title;
        $lesson->meta_description       = $request->meta_description;

        if( $lesson->save() ){
            session()->flash('success', 'Lesson Updated');
            return redirect()->route('lesson.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('delete-lesson'))
            abort(403, 'Unauthorized action.');

        $bool = $this->lesson->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Lesson deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-lesson'))
            abort(403, 'Unauthorized action.');

        $lesson        = $this->lesson->with(['program','grade','subject','unit'])->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $lesson        = $lesson->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $lesson        = $lesson->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $lesson        = $lesson->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $lesson        = $lesson->where('grade_id',request('grade_id'));
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $lesson        = $lesson->where('subject_id',request('subject_id'));
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $lesson        = $lesson->where('unit_id',request('unit_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $lesson        = $lesson->where('status',request('status'));
        }

        $lessons           = $lesson->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'unit_id'           => request('unit_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.lesson.trash',compact('lessons','programs'))->with('title','Soft Deleted Lessons');
    }

    public function restore($id)
    {
        $bool = $this->lesson->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Lesson restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->lesson->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Lesson deleted successfully",
            ]);
        }
    }

    public function getNotesByLesson($id){
        return 
            $this->lesson->with('notes:id,title,lesson_id')->find($id);
    }

    public function getImport(){
        if(!auth()->user()->can('create-lesson'))
            abort(403, 'Unauthorized action.');

        // if (request()->has('sample') AND !empty(request('sample'))) {
           
        //     return Excel::download(new ExportNoteSubjectiveQuestionsSample(collect([])), 'exercise-sample.xlsx');
        // }

        $programs           = $this->program->pluck('name','id');
        $faculties           = $this->faculty->pluck('name','id');

        return view('backend.lesson.import',compact('programs','faculties'))->with('title','Import Lessons');
    }

    public function import(Request $request){
        if(!auth()->user()->can('create-lesson'))
            abort(403, 'Unauthorized action.');

        // $this->validate($request, [
        //     'import_file'  => 'required|mimes:xls,xlsx',
        //     'program_id'  => 'required|exists:programs,id',
        //     'faculty_id'  => 'required|exists:faculties,id',
        //     'grade_id'    => 'required|exists:grades,id',
        //     'subject_id'  => 'required|exists:subjects,id',
        // ]);
        
        try {
            // Excel::import(new ImportLessons($request->program_id,$request->faculty_id,$request->grade_id,$request->subject_id),  request()->file('import_file'));
            Excel::import(new ImportLessons($request->program_id,$request->faculty_id,$request->grade_id),  request()->file('import_file'));
            session()->flash('success', 'Lessons Imported');
            return redirect()->route('lesson.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
