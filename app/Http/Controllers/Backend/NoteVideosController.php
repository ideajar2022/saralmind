<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Note;
use App\Models\NoteVideo;
use App\Exports\ExportNoteVideos;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\NoteVideo\StoreNoteVideoRequest;
use App\Http\Requests\NoteVideo\UpdateNoteVideoRequest;

class NoteVideosController extends Controller
{
    private $program;
    private $note;
    private $noteVideo;

    public function __construct(Program $program, Note $note, NoteVideo $noteVideo)
    {
        $this->middleware('auth:admin');
        $this->program          = $program;
        $this->note             = $note;
        $this->noteVideo        = $noteVideo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-note-video'))
            abort(403, 'Unauthorized action.');

        $noteVideo        = $this->noteVideo->with(['note']);

        if (request()->has('q')) {
            $title          = request('q');
            $noteVideo      = $noteVideo->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $noteVideo        = $noteVideo->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $noteVideo->latest()->get();
            return Excel::download(new ExportNoteVideos($result), 'noteVideos.xlsx');
        }

        $noteVideos           = $noteVideo->latest()->paginate(50)->appends([
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

        return view('backend.note-video.index',compact('noteVideos','programs'))->with('title','Note Videos');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-note-video'))
            abort(403, 'Unauthorized action.');
        $noteVideo      = $this->noteVideo;
        $programs       = $this->program->pluck('name','id');

        return view('backend.note-video.create',compact('programs','noteVideo'))->with('title','Create Note Video');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteVideoRequest $request)
    {
        if(!auth()->user()->can('create-note-video'))
            abort(403, 'Unauthorized action.');

        $this->noteVideo->note_id                = $request->note_id;
        $this->noteVideo->url                    = $request->url;
        $this->noteVideo->key                    = $request->key;
        $this->noteVideo->title                  = $request->title;
        $this->noteVideo->description            = $request->description;
        $this->noteVideo->type                   = 'YOUTUBE';
        $this->noteVideo->status                 = $request->status;
        $this->noteVideo->created_by             = auth()->id();
    
        if( $this->noteVideo->save() ){
            session()->flash('success','Note Video Created');
            return redirect()->route('video.index');
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
        if(!auth()->user()->can('edit-note-video'))
            abort(403, 'Unauthorized action.');

        $noteVideo     = $this->noteVideo->find($id);
        $programs      = $this->program->pluck('name','id');

        return view('backend.note-video.edit',compact('programs','noteVideo'))->with('title','Edit Note Video');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteVideoRequest $request, $id)
    {
        if(!auth()->user()->can('edit-note-video'))
            abort(403, 'Unauthorized action.');

        $noteVideo                  = $this->noteVideo->find($id);
        
        $noteVideo->note_id                = $request->note_id;
        $noteVideo->url                    = $request->url;
        $noteVideo->key                    = $request->key;
        $noteVideo->title                  = $request->title;
        $noteVideo->description            = $request->description;
        $noteVideo->status                 = $request->status;
      
        if( $noteVideo->save() ){
            session()->flash('success', 'Note Video Updated');
            return redirect()->route('video.index');
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
        if(!auth()->user()->can('delete-note-video'))
            abort(403, 'Unauthorized action.');

        $bool = $this->noteVideo->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note video deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-note-video'))
            abort(403, 'Unauthorized action.');

        $noteVideo        = $this->noteVideo->with(['note'])->onlyTrashed();

        if (request()->has('q')) {
            $title          = request('q');
            $noteVideo      = $noteVideo->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $programId        = request('program_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($programId){
                $query->where('program_id',$programId);
            });
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $classId        = request('grade_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($classId){
                $query->where('grade_id',$classId);
            });
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $subjectId        = request('subject_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($subjectId){
                $query->where('subject_id',$subjectId);
            });
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $unitId        = request('unit_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($unitId){
                $query->where('unit_id',$unitId);
            });
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $lessonId        = request('lesson_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($lessonId){
                $query->where('lesson_id',$lessonId);
            });
        }

        if (request()->has('note_id') AND !empty(request('note_id'))) {
            $noteId        = request('note_id');
            $noteVideo        = $noteVideo->whereHas('note',function($query) use ($noteId){
                $query->where('note_id',$noteId);
            });
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $noteVideo        = $noteVideo->where('status',request('status'));
        }

        $noteVideos           = $noteVideo->latest()->paginate(50)->appends([
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

        return view('backend.note-video.trash',compact('noteVideos','programs'))->with('title','Soft Deleted Note Videos');
    }

    public function restore($id)
    {
        $bool = $this->noteVideo->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note video restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->noteVideo->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note video deleted successfully",
            ]);
        }
    }
}
