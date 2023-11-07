<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Note;
use App\Models\NoteComment;


class NoteCommentsController extends Controller
{
    private $program;
    private $note;
    private $noteComment;

    public function __construct(Program $program, Note $note, NoteComment $noteComment)
    {
        $this->middleware('auth:admin');
        $this->program          = $program;
        $this->note             = $note;
        $this->noteComment      = $noteComment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-note-comment'))
            abort(403, 'Unauthorized action.');

        $noteComment        = $this->noteComment->with(['note']);

        if (request()->has('q')) {
            $title          = request('q');
            $noteComment      = $noteComment->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('class_id') AND !empty(request('class_id'))) {
            $classId        = request('class_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($classId){
                $query->where('class_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $noteComment        = $noteComment->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $noteComment        = $noteComment->where('status',request('status'));
        }

        $noteComments           = $noteComment->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'class_id'          => request('class_id'),
            'subject_id'        => request('subject_id'),
            'unit_id'           => request('unit_id'),
            'lesson_id'         => request('lesson_id'),
            'note_id'           => request('note_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.note-comment.index',compact('noteComments','programs'))->with('title','Note Comments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
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
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->can('delete-note-comment'))
            abort(403, 'Unauthorized action.');

        $bool = $this->noteComment->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note Comment deleted successfully",
            ]);
        }
    }
}
