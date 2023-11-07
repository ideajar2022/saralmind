<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use File;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Models\Lesson;
use App\Models\Note;
use App\Imports\ImportNotes;
use App\Exports\ExportNotes;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Note\StoreNoteRequest;
use App\Http\Requests\Note\UpdateNoteRequest;
use Elasticsearch\ClientBuilder;
use App\Models\Admin;

class NotesController extends Controller
{
    private $program;
    private $faculty;
    private $grade;
    private $subject;
    private $unit;
    private $lesson;
    private $note;
    private $client;

    public function __construct(Program $program, Faculty $faculty, Grade $grade, Subject $subject, Unit $unit, Lesson $lesson, Note $note)
    {
        $this->middleware('auth:admin');
        $this->program      = $program;
        $this->faculty      = $faculty;
        $this->grade        = $grade;
        $this->subject      = $subject;
        $this->unit         = $unit;
        $this->lesson       = $lesson;
        $this->note         = $note;

        $this->path = public_path('/backend/images/notes/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-note'))
            abort(403, 'Unauthorized action.');

        $note        = $this->note->select(['id','title','description','summary','things_to_remember','status','program_id','faculty_id','grade_id','subject_id','lesson_id','unit_id'])->with(['program','faculty','grade','subject','lesson']);

        if (request()->has('q')) {
            $title           = request('q');
            $note        = $note->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $note        = $note->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $note        = $note->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $note        = $note->where('grade_id',request('grade_id'));
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $note        = $note->where('subject_id',request('subject_id'));
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $note        = $note->where('unit_id',request('unit_id'));
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $note        = $note->where('lesson_id',request('lesson_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $note        = $note->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $note->latest()->get();
            return Excel::download(new ExportNotes($result), 'notes.xlsx');
        }

        $notes           = $note->orderBy('order','ASC')
                            ->latest()
                            ->paginate(20)
                            ->appends([
                            'q'                 => request('q'),
                            'program_id'        => request('program_id'),
                            'program_id'        => request('program_id'),
                            'faculty_id'        => request('faculty_id'),
                            'subject_id'        => request('subject_id'),
                            'unit_id'           => request('unit_id'),
                            'lesson_id'         => request('lesson_id'),
                            'status'            => request('status'),
                        ]);


        $programs           =   $this->program->pluck('name','id');
        $faculties          =   $this->faculty->pluck('name','id');
        $grades             =   $this->grade->pluck('name','id');
        $subjects           =   $this->subject->pluck('name','id');
        $lessons            =   $this->lesson->pluck('name','id');
        // $admins             =   Admin::all();
        $admins             =   Admin::where('status','Active')->get();

        return view('backend.note.index',compact('notes','programs','faculties','grades','subjects','lessons','admins'))->with('title','Notes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-note'))
            abort(403, 'Unauthorized action.');
        $note           = $this->note;
        $programs       = $this->program->pluck('name','id');

        $admins             =   Admin::where('status','Active')->get();

        $live_preview_link = null;

        return view('backend.note.create',compact('programs','note','admins','live_preview_link'))->with('title','Create Note');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoteRequest $request)
    {
        if(!auth()->user()->can('create-note'))
            abort(403, 'Unauthorized action.');

        $program = $this->program->find($request->program_id);
        $faculty = $this->faculty->find($request->faculty_id);
        $grade = $this->grade->find($request->grade_id);
        $subject = $this->subject->find($request->subject_id);
        $lesson = $this->lesson->find($request->lesson_id);

        $image_name = NULL;
        if($request->file){
            // Store note images in classified directories.
            if(!File::isDirectory($this->path.$program->slug))
                File::makeDirectory($this->path.$program->slug, 0777, true, true);

            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug, 0777, true, true);
                   
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug, 0777, true, true);
            
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug, 0777, true, true);
            
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug,'/',$lesson->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug,'/',$lesson->slug, 0777, true, true);
            
            $image_name = $request->slug . '.' .$request->file->extension();
            
            $request->file->move($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug.'/'.$lesson->slug,$image_name);
        }

        // get heading and bold tag values from CkEditor and add it to meta keyword
        $meta_keyword = $program->name.", ".$faculty->name.", ".$grade->name.", ".$subject->name.", ".$lesson->name.", ".$request->title.", ";

        $tags = array("h1", "h2", "h3", "h4", "h5", "h6", "strong");
        $content = $request->description;
        $dom = new \DOMDocument();
        $dom->loadHTML($content);
        $headings = $dom->getElementsByTagName('h1');

        foreach($tags as $tag){
            $headings = $dom->getElementsByTagName($tag);
            if($headings->length == 0) continue;
                
            foreach($headings as $heading){
                $text = $heading->textContent;
                $meta_keyword = $meta_keyword . $text . ", ";
            }
        }


        $this->note->title                  = $request->title;
        $this->note->slug                   = $request->slug;
        $this->note->image                  = $image_name;
        $this->note->description            = $request->description;
        $this->note->program_id             = $request->program_id;
        $this->note->faculty_id             = $request->faculty_id;
        $this->note->grade_id               = $request->grade_id;
        $this->note->subject_id             = $request->subject_id;
        $this->note->unit_id                = $request->unit_id;
        $this->note->lesson_id              = $request->lesson_id;
        $this->note->summary                = $request->summary;
        $this->note->things_to_remember     = $request->things_to_remember;
        $this->note->meta_keyword           = $meta_keyword;
        $this->note->meta_title             = $request->meta_title;
        $this->note->meta_description       = $request->meta_description;
        $this->note->order                  = $request->order;
        $this->note->status                 = $request->status;
        
        $this->note->created_by             = auth()->id();

        if( $this->note->save() ){
            session()->flash('success','Note Created');
            return redirect()->route('note.index');
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
        if(!auth()->user()->can('edit-note'))
            abort(403, 'Unauthorized action.');

        $note                       = $this->note->find($id);
        $programs                   = $this->program->pluck('name','id');
        $admins                     =   Admin::where('status','Active')->get();

        $live_preview_link = 'https://www.saralmind.com/'.$note->program->slug.'/'.$note->faculty->slug.'/'.$note->grade->slug.'/'.$note->subject->slug.'/'.$note->lesson->slug.'/'.$note->slug.'?admin=true';

        return view('backend.note.edit',compact('programs','note','admins','live_preview_link'))->with('title','Edit note');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoteRequest $request, $id)
    {
        if(!auth()->user()->can('edit-note'))
            abort(403, 'Unauthorized action.');

        $program                        = $this->program->find($request->program_id);
        $faculty                        = $this->faculty->find($request->faculty_id);
        $grade                          = $this->grade->find($request->grade_id);
        $subject                        = $this->subject->find($request->subject_id);
        $lesson                         = $this->lesson->find($request->lesson_id);
        $admins                         = Admin::all();
        $note                           = $this->note->find($id);

        // Update note images in classified directories.
        $image_name = NULL;
        if($request->file){
            // Store note images in classified directories.
            if(!File::isDirectory($this->path.$program->slug))
                File::makeDirectory($this->path.$program->slug, 0777, true, true);

            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug, 0777, true, true);
                   
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug, 0777, true, true);
            
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug, 0777, true, true);
            
            if(!File::isDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug,'/',$lesson->slug))
                File::makeDirectory($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug,'/',$lesson->slug, 0777, true, true);
            
            $image_name = $request->slug . '.' .$request->file->extension();
            
            $request->file->move($this->path.$program->slug.'/'.$faculty->slug.'/'.$grade->slug.'/'.$subject->slug.'/'.$lesson->slug,$image_name);
        }

        // get heading and bold tag values from CkEditor and add it to meta keyword
        $meta_keyword = $program->name.", ".$faculty->name.", ".$grade->name.", ".$subject->name.", ".$lesson->name.", ".$request->title.", ";

        $tags = array("h1", "h2", "h3", "h4", "h5", "h6", "strong");
        $content = $request->description;
        $dom = new \DOMDocument();
        $dom->loadHTML($content);

        foreach($tags as $tag){
            $headings = $dom->getElementsByTagName($tag);
            if($headings->length == 0) continue;
                
            foreach($headings as $heading){
                $text = $heading->textContent;
                $meta_keyword = $meta_keyword . $text . ", ";
            }
        }

        $note->title                  = $request->title;
        $note->slug                   = $request->slug;
        $note->image                  = $image_name;
        $note->description            = $request->description;
        $note->program_id             = $request->program_id;
        $note->faculty_id             = $request->faculty_id;
        $note->grade_id               = $request->grade_id;
        $note->subject_id             = $request->subject_id;
        $note->unit_id                = $request->unit_id;
        $note->lesson_id              = $request->lesson_id;
        $note->summary                = $request->summary;
        $note->things_to_remember     = $request->things_to_remember;
        $note->meta_keyword           = $request->meta_keyword;
        $note->meta_title             = $request->meta_title;
        $note->meta_description       = $request->meta_description;
        $note->order                  = $request->order;
        $note->status                 = $request->status;

        if($note->updated_by == []){
            $note->updated_by = array(auth()->user()->id);
        }

        else{
            $updated_by = $note->updated_by;
            array_push($updated_by,auth()->user()->id);
            $note->updated_by = $updated_by;
        }
        
        $live_preview_link = 'https://www.saralmind.com/'.$program->slug.'/'.$grade->slug.'/'.$subject->slug.'/'.$lesson->slug.'/'.$note->slug;

        if( $note->save() ){
            session()->flash('success', 'Note Updated');
            return redirect()->route('note.index');
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
        if(!auth()->user()->can('delete-note'))
            abort(403, 'Unauthorized action.');

        $bool = $this->note->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-note'))
            abort(403, 'Unauthorized action.');

        $note        = $this->note->select(['id','title','status','program_id','faculty_id','grade_id','subject_id','lesson_id','unit_id'])->with(['program','faculty','grade','subject','unit','lesson'])->onlyTrashed();

        if (request()->has('q')) {
            $title           = request('q');
            $note        = $note->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $note        = $note->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $note        = $note->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $note        = $note->where('grade_id',request('grade_id'));
        }

        if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $note        = $note->where('subject_id',request('subject_id'));
        }

        if (request()->has('unit_id') AND !empty(request('unit_id'))) {
            $note        = $note->where('unit_id',request('unit_id'));
        }

        if (request()->has('lesson_id') AND !empty(request('lesson_id'))) {
            $note        = $note->where('lesson_id',request('lesson_id'));
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $note        = $note->where('status',request('status'));
        }

        $notes           = $note->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'unit_id'           => request('unit_id'),
            'lesson_id'         => request('lesson_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.note.trash',compact('notes','programs'))->with('title','Soft Deleted Notes');
    }

    public function restore($id)
    {
        $bool = $this->note->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->note->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Note deleted successfully",
            ]);
        }
    }

    public function autoSave(Request $request, $id){
        $note                         = $this->note->find($id);
        $note->description            = $request->description;
        $note->save();
        return ['status'=>true,'message'=>'Note has been autosaved successfully'];
    }

    public function sync()
    {
        $note        = $this->note->select(['id','title','description','summary','things_to_remember','status','program_id','faculty_id','grade_id','subject_id','lesson_id','unit_id'])->with(['program','grade','subject','unit','lesson']);

        
        $notes           = $note->whereStatus("APPROVED")->get();
        $this->_deleteToElasticSearch();
        $this->_addNotesToElasticSearch($notes);
    }

    private function _addNotesToElasticSearch($notes)
    {
        foreach ($notes as $note) {

            // Add index and type data to array

            $data['body'][] = [
                'index' => [
                    '_index'    => Note::ELASTIC_INDEX, 
                    '_type'     => Note::ELASTIC_TYPE
                ]
            ];

            // Note data that will be required for later search
            $data['body'][] = [
                'id'            => $note->id,
                'title'         => $note->title,
                'summary'       => $note->summary,
                'program'       => @$note->program->name,
                'faculty'       => @$note->faculty->name,
                'grade'         => @$note->grade->name,
                'subject'       => @$note->subject->name,
                'unit'          => @$note->unit->name,
                'lesson'        => @$note->lesson->name,
            ];
        }

        // Execute Elasticsearch bulk command for indexing multiple data
        $response = $this->client->bulk($data);
    }

    private function _deleteToElasticSearch()
    {
        $params = [
            'index' => Note::ELASTIC_INDEX,
            'type' => Note::ELASTIC_TYPE,
            'body' => [
                'query' => [
                    'match_all' => (object)[]
                ]
            ]
        ];
        return $this->client->deleteByQuery($params);
    }

    public function getImport(){
        if(!auth()->user()->can('create-note'))
            abort(403, 'Unauthorized action.');

        // if (request()->has('sample') AND !empty(request('sample'))) {
           
        //     return Excel::download(new ExportNoteSubjectiveQuestionsSample(collect([])), 'exercise-sample.xlsx');
        // }

        $programs           = $this->program->pluck('name','id');

        return view('backend.note.import',compact('programs'))->with('title','Import Notes');
    }

    public function import(Request $request){
        if(!auth()->user()->can('create-note'))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx',
            // 'program_id'  => 'required|exists:programs,id',
            // 'faculty_id'  => 'required|exists:faculties,id',
            // 'grade_id'    => 'required|exists:grades,id',
            // 'subject_id'  => 'required|exists:subjects,id',
            // 'lesson_id'  => 'required|exists:lessons,id',
        ]);

        try {
            // $test = array($request->program_id, $request->faculty_id,$request->grade_id);
            // Excel::import(new ImportNotes($request->program_id,$request->faculty_id,$request->grade_id,$request->subject_id,$request->lesson_id),  request()->file('import_file'));


            Excel::import(new ImportNotes($request->program_id,$request->faculty_id,$request->grade_id),  request()->file('import_file'));
            session()->flash('success', 'Notes Imported');
            return redirect()->route('note.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }

    public function viewUpdated(){
        if(!auth()->user()->can('view-updated-notes'))
            abort(403, 'Unauthorized action.');

        $note        = $this->note->select(['id','title','status','created_by','updated_at','updated_by'])->with(['program','faculty','grade','subject','lesson'])->where('updated_by','!=','[]');

        if (request()->has('q')) {
            $title           = request('q');
            $note        = $note->where('title','LIKE',"%{$title}%");
        }

        if (request()->has('admin') AND !empty(request('admin'))) {
            $admin_id = Admin::where('name',request('admin'))->pluck('id')->first();
            $note        = $note->where('updated_by','LIKE',"%[$admin_id,%")
                                ->orWhere('updated_by','LIKE',"%,$admin_id]%")
                                ->orWhere('updated_by','LIKE',"%,$admin_id,%")
                                ->orWhere('updated_by','LIKE',"%[$admin_id]%");
        }
        
        if (request()->has('status') AND !empty(request('status'))) {
            $note        = $note->where('status',request('status'));
        }

        $notes           = $note->latest()->paginate(20)->appends([
            'q'                 => request('q'),
            'admin'            => request('admin'),
            'status'            => request('status'),
        ]);

        $admins = Admin::all();

        return view('backend.note.note-updates',compact('notes','admins'))->with('title','Note Updates');
    }

}
