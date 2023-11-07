<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Note;
use App\Models\NoteSubjectiveQuestion;
use App\Imports\ImportNoteSubjectiveQuestions;
// use App\Imports\ImportSubjectiveQuestions;
use App\Exports\ExportNoteSubjectiveQuestionsSample;
use App\Exports\ExportNoteSubjectiveQuestions;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\NoteSubjectiveQuestion\StoreNoteSubjectiveQuestionRequest;
use App\Http\Requests\NoteSubjectiveQuestion\UpdateNoteSubjectiveQuestionRequest;
use App\Models\Admin;

class NoteSubjectiveQuestionsController extends Controller
{
    private $program;
    private $note;
    private $subjectiveQuestion;

    public function __construct(Program $program, Note $note, NoteSubjectiveQuestion $subjectiveQuestion)
    {
        $this->middleware('auth:admin');
        $this->program          = $program;
        $this->note             = $note;
        $this->subjectiveQuestion         = $subjectiveQuestion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        $subjectiveQuestion        = $this->subjectiveQuestion->with(['note']);

        if (request()->has('q')) {
            $question          = request('q');
            $subjectiveQuestion      = $subjectiveQuestion->where('question','LIKE',"%{$question}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $subjectiveQuestion        = $subjectiveQuestion->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $subjectiveQuestion->latest()->get();
            return Excel::download(new ExportNoteSubjectiveQuestions($result), 'subjective-questions.xlsx');
        }

        $subjectiveQuestions           = $subjectiveQuestion->latest('id')->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'unit_id'           => request('unit_id'),
            'lesson_id'         => request('lesson_id'),
            'note_id'           => request('note_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');
        $admins             =   Admin::all();

        return view('backend.note-subjective-question.index',compact('subjectiveQuestions','programs','admins'))->with('title','Note Subjective Questions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-note-subjective-question'))
            abort(403, 'Unauthorized action.');
        $subjectiveQuestion      = $this->subjectiveQuestion;
        $programs                = $this->program->pluck('name','id');
        $admins = Admin::all();

        return view('backend.note-subjective-question.create',compact('programs','subjectiveQuestion','admins'))->with('title','Create Subjective Question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteSubjectiveQuestionRequest $request)
    {
        if(!auth()->user()->can('create-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        $this->subjectiveQuestion->note_id                = $request->note_id;
        $this->subjectiveQuestion->question               = $request->question;
        $this->subjectiveQuestion->answer                 = $request->answer;
        $this->subjectiveQuestion->type                   = $request->type;
        $this->subjectiveQuestion->difficulty_level       = $request->difficulty_level;
        $this->subjectiveQuestion->marks                  = $request->marks;
        $this->subjectiveQuestion->status                 = $request->status;
        $this->subjectiveQuestion->created_by             = auth()->id();
    
        if( $this->subjectiveQuestion->save() ){
            session()->flash('success','Note Subjective Question Created');
            return redirect()->route('exercise.index');
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
        if(!auth()->user()->can('edit-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        $subjectiveQuestion     = $this->subjectiveQuestion->find($id);
        $programs               = $this->program->pluck('name','id');
        $admins = Admin::all();

        return view('backend.note-subjective-question.edit',compact('programs','subjectiveQuestion','admins'))->with('title','Edit Note Subjective Question');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteSubjectiveQuestionRequest $request, $id)
    {
        if(!auth()->user()->can('edit-note-subjective-question'))
            abort(403, 'Unauthorized action.');
    
        $subjectiveQuestion         = $this->subjectiveQuestion->find($id);
        $subjectiveQuestion->note_id                = $request->note_id;
        $subjectiveQuestion->question               = $request->question;
        $subjectiveQuestion->answer                 = $request->answer;
        $subjectiveQuestion->type                   = $request->type;
        $subjectiveQuestion->difficulty_level       = $request->difficulty_level;
        $subjectiveQuestion->marks                  = $request->marks;
        $subjectiveQuestion->status                 = $request->status;

        if($subjectiveQuestion->updated_by == []){
            $subjectiveQuestion->updated_by = array(auth()->user()->id);
        }

        else{
            $updated_by = $subjectiveQuestion->updated_by;
            array_push($updated_by,auth()->user()->id);
            
            // if(!in_array(auth()->user()->id, $updated_by)){
            //     dd("exists");
            // }
            // else{
            //     dd("does not exist");
            // }
            
            $subjectiveQuestion->updated_by = $updated_by;
        }
     
      
        if( $subjectiveQuestion->save() ){
            session()->flash('success', 'Note Subjective Question Updated');
            return redirect()->route('exercise.index');
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
        if(!auth()->user()->can('delete-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        $bool = $this->subjectiveQuestion->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note Subjective Question Deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        $subjectiveQuestion        = $this->subjectiveQuestion->with(['note'])->onlyTrashed();

        if (request()->has('q')) {
            $question          = request('q');
            $subjectiveQuestion      = $subjectiveQuestion->where('question','LIKE',"%{$question}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $subjectiveQuestion        = $subjectiveQuestion->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $subjectiveQuestion        = $subjectiveQuestion->where('status',request('status'));
        }

        $subjectiveQuestions           = $subjectiveQuestion->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'unit_id'           => request('unit_id'),
            'lesson_id'         => request('lesson_id'),
            'note_id'           => request('note_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.note-subjective-question.trash',compact('subjectiveQuestions','programs'))->with('title','Soft Deleted Note Subjective Questions');
    }

    public function restore($id)
    {
        $bool = $this->subjectiveQuestion->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note subjective question restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->subjectiveQuestion->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note subjective question deleted successfully",
            ]);
        }
    }

    public function getImport()
    {
        // if (request()->has('sample') AND !empty(request('sample'))) {
           
        //     return Excel::download(new ExportNoteSubjectiveQuestionsSample(collect([])), 'exercise-sample.xlsx');
        // }
        
        // return view('backend.note-subjective-question.import')->with('title','Import Excercises');

        // dd("working123");
        if(!auth()->user()->can('create-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        if (request()->has('sample') AND !empty(request('sample'))) {
           
            return Excel::download(new ExportNoteSubjectiveQuestionsSample(collect([])), 'exercise-sample.xlsx');
        }

        $programs           = $this->program->pluck('name','id');

        return view('backend.note-subjective-question.import',compact('programs'))->with('title','Import Excercises');
    }

    public function import(Request $request)
    {
        // // dd("working");
        // $file = $request->file('import_file');

        // try{
        //     Excel::import(new ImportSubjectiveQuestions, $file);
        //         session()->flash('success', 'Exercises Imported');
        //         return redirect()->route('exercise.index');
        //     // return back()->withStatus('Excel file imported successfully');
        // }
        // catch(\Exception $e){
        //     session()->flash('error', $e->getMessage());
        //     return redirect()->back();
        // }


        if(!auth()->user()->can('create-note-subjective-question'))
            abort(403, 'Unauthorized action.');

        // $this->validate($request, [
        //     'import_file'  => 'required|mimes:xls,xlsx',
        //     'program_id'  => 'required|exists:programs,id',
        //     'faculty_id'  => 'required|exists:faculties,id',
        //     'grade_id'    => 'required|exists:grades,id',
        //     'subject_id'  => 'required|exists:subjects,id',
        //     'lesson_id'   => 'required|exists:lessons,id',
        //     'note_id'     => 'required|exists:notes,id',
        // ]);
        try {
            Excel::import(new ImportNoteSubjectiveQuestions($request->note_id),  request()->file('import_file'));
            session()->flash('success', 'Exercises Imported');
            return redirect()->route('exercise.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
        
    }


    public function viewUpdated(){

        if(!auth()->user()->can('view-updated-subjective-questions'))
            abort(403, 'Unauthorized action.');

        $subjectiveQuestion        = $this->subjectiveQuestion->select(['id','question','status','created_by','updated_at','updated_by'])->where('updated_by','!=','[]');

        if (request()->has('q')) {
            $title           = request('q');
            $subjectiveQuestion        = $subjectiveQuestion->where('question','LIKE',"%{$title}%");
        }

        if (request()->has('admin') AND !empty(request('admin'))) {
            $admin_id = Admin::where('name',request('admin'))->pluck('id')->first();
            $subjectiveQuestion        = $subjectiveQuestion->where('updated_by','LIKE',"%[$admin_id,%")
                                ->orWhere('updated_by','LIKE',"%,$admin_id]%")
                                ->orWhere('updated_by','LIKE',"%,$admin_id,%")
                                ->orWhere('updated_by','LIKE',"%[$admin_id]%");
        }
        
        if (request()->has('status') AND !empty(request('status'))) {
            $subjectiveQuestion        = $subjectiveQuestion->where('status',request('status'));
        }

        $subjectiveQuestions           = $subjectiveQuestion->latest()->paginate(20)->appends([
            'q'                 => request('q'),
            'admin'            => request('admin'),
            'status'            => request('status'),
        ]);

        $admins = Admin::all();

        return view('backend.note-subjective-question.updates',compact('subjectiveQuestions','admins'))->with('title','Exercise Updates');
    }

}
