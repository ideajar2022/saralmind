<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Note;
use App\Models\NoteObjectiveQuestion;
use App\Exports\ExportNoteObjectiveQuestionsSample;
use App\Exports\ExportNoteObjectiveQuestions;
use App\Imports\ImportNoteObjectiveQuestions;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\NoteObjectiveQuestion\StoreNoteObjectiveQuestionRequest;
use App\Http\Requests\NoteObjectiveQuestion\UpdateNoteObjectiveQuestionRequest;

class NoteObjectiveQuestionsController extends Controller
{
    private $program;
    private $note;
    private $objectiveQuestion;

    public function __construct(Program $program, Note $note, NoteObjectiveQuestion $objectiveQuestion)
    {
        $this->middleware('auth:admin');
        $this->program          = $program;
        $this->note             = $note;
        $this->objectiveQuestion         = $objectiveQuestion;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $objectiveQuestion        = $this->objectiveQuestion->with(['note']);

        if (request()->has('q')) {
            $question          = request('q');
            $objectiveQuestion      = $objectiveQuestion->where('question','LIKE',"%{$question}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $objectiveQuestion        = $objectiveQuestion->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $objectiveQuestion->latest()->get();
            return Excel::download(new ExportNoteObjectiveQuestions($result), 'objective-questions.xlsx');
        }

        $objectiveQuestions           = $objectiveQuestion->latest('id')->paginate(50)->appends([
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

        return view('backend.note-objective-question.index',compact('objectiveQuestions','programs'))->with('title','Note Objective Questions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-note-objective-question'))
            abort(403, 'Unauthorized action.');
        $objectiveQuestion      = $this->objectiveQuestion;
        $programs                = $this->program->pluck('name','id');

        return view('backend.note-objective-question.create',compact('programs','objectiveQuestion'))->with('title','Create Note Objective Question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteObjectiveQuestionRequest $request)
    {
        if(!auth()->user()->can('create-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $this->objectiveQuestion->note_id                = $request->note_id;
        $this->objectiveQuestion->question               = $request->question;
        $this->objectiveQuestion->correct_answer         = $request->correct_answer;
        $this->objectiveQuestion->option_1               = $request->option_1;
        $this->objectiveQuestion->option_2               = $request->option_2;
        $this->objectiveQuestion->option_3               = $request->option_3;
        $this->objectiveQuestion->option_4               = $request->option_4;
        $this->objectiveQuestion->option_5               = $request->option_5;
        $this->objectiveQuestion->option_6               = $request->option_6;
        $this->objectiveQuestion->option_7               = $request->option_7;
        $this->objectiveQuestion->option_8               = $request->option_8;
        $this->objectiveQuestion->option_9               = $request->option_9;
        $this->objectiveQuestion->option_10              = $request->option_10;
        $this->objectiveQuestion->explanation            = $request->explanation;
        $this->objectiveQuestion->marks                  = $request->marks;
        $this->objectiveQuestion->difficulty_level       = $request->difficulty_level;
        $this->objectiveQuestion->status                 = $request->status;
        $this->objectiveQuestion->created_by             = auth()->id();
    
        if( $this->objectiveQuestion->save() ){
            session()->flash('success','Note Objective Question Created');
            return redirect()->route('mcq.index');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->can('edit-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $objectiveQuestion     = $this->objectiveQuestion->find($id);
        $programs               = $this->program->pluck('name','id');

        return view('backend.note-objective-question.edit',compact('programs','objectiveQuestion'))->with('title','Edit Note Objective Question');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteObjectiveQuestionRequest $request, $id)
    {
        if(!auth()->user()->can('edit-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $objectiveQuestion         = $this->objectiveQuestion->find($id);

        $objectiveQuestion->note_id                = $request->note_id;
        $objectiveQuestion->question               = $request->question;
        $objectiveQuestion->correct_answer         = $request->correct_answer;
        $objectiveQuestion->option_1               = $request->option_1;
        $objectiveQuestion->option_2               = $request->option_2;
        $objectiveQuestion->option_3               = $request->option_3;
        $objectiveQuestion->option_4               = $request->option_4;
        $objectiveQuestion->option_5               = $request->option_5;
        $objectiveQuestion->option_6               = $request->option_6;
        $objectiveQuestion->option_7               = $request->option_7;
        $objectiveQuestion->option_8               = $request->option_8;
        $objectiveQuestion->option_9               = $request->option_9;
        $objectiveQuestion->option_10              = $request->option_10;
        $objectiveQuestion->explanation            = $request->explanation;
        $objectiveQuestion->marks                  = $request->marks;
        $objectiveQuestion->difficulty_level       = $request->difficulty_level;
        $objectiveQuestion->status                 = $request->status;
     
      
        if( $objectiveQuestion->save() ){
            session()->flash('success', 'Note Objective Question Updated');
            return redirect()->route('mcq.index');
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
        if(!auth()->user()->can('delete-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $bool = $this->objectiveQuestion->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note Objective Question Deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $objectiveQuestion        = $this->objectiveQuestion->with(['note'])->onlyTrashed();

        if (request()->has('q')) {
            $question          = request('q');
            $objectiveQuestion      = $objectiveQuestion->where('question','LIKE',"%{$question}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $objectiveQuestion        = $objectiveQuestion->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $objectiveQuestion        = $objectiveQuestion->where('status',request('status'));
        }

        $objectiveQuestions           = $objectiveQuestion->latest()->paginate(50)->appends([
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

        return view('backend.note-objective-question.trash',compact('objectiveQuestions','programs'))->with('title','Soft Deleted Note Objective Questions');
    }

    public function restore($id)
    {
        $bool = $this->objectiveQuestion->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note objective question restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->objectiveQuestion->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note objective question deleted successfully",
            ]);
        }
    }

    public function getImport()
    {
        if(!auth()->user()->can('create-note-objective-question'))
            abort(403, 'Unauthorized action.');

        if (request()->has('sample') AND !empty(request('sample'))) {
           
            return Excel::download(new ExportNoteObjectiveQuestionsSample(collect([])), 'mcq-sample.xlsx');
        }

        $programs           = $this->program->pluck('name','id');

        return view('backend.note-objective-question.import',compact('programs'))->with('title','Import MCQs');
    }

    public function import(Request $request)
    {
        if(!auth()->user()->can('create-note-objective-question'))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'import_file'   => 'required|mimes:xls,xlsx',
            'program_id'    => 'required|exists:programs,id',
            'grade_id'      => 'required|exists:grades,id',
            'subject_id'    => 'required|exists:subjects,id',
            'lesson_id'     => 'required|exists:lessons,id',
            'note_id'       => 'required|exists:notes,id',
        ]);
        try {
            Excel::import(new ImportNoteObjectiveQuestions($request->note_id),  request()->file('import_file'));
            session()->flash('success', 'MCQs Imported');
            return redirect()->route('mcq.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
        
    }
    
}
