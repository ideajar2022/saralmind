<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
// use Request;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Imports\ImportSubjects;
use App\Exports\ExportSubjects;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use App\Http\Requests\Subject\ReuseSubjectRequest;

class SubjectsController extends Controller
{
    private $program;
    private $faculty;
    private $grade;
    private $subject;

    public function __construct(Program $program, Faculty $faculty, Grade $grade, Subject $subject)
    {
        $this->middleware('auth:admin');
        $this->program              = $program;
        $this->faculty              = $faculty;
        $this->grade                = $grade;
        $this->subject              = $subject;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!auth()->user()->can('view-subject'))
            abort(403, 'Unauthorized action.');

        $subject        = $this->subject->with(['program','faculty','grade']);

        if (request()->has('q')) {
            $name           = request('q');
            $subject        = $subject->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $subject        = $subject->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $subject        = $subject->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $subject        = $subject->where('grade_id',request('grade_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $subject        = $subject->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $subject->latest()->get();
            return Excel::download(new ExportSubjects($result), 'subjects.xlsx');
        }

        $subjects           = $subject->latest()->paginate(10)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'status'            => request('status'),
        ]);

        $programs               =   $this->program->pluck('name','id');
        $faculties              =   $this->faculty->pluck('name','id');
        $grades                 =   $this->grade->pluck('name','id');

        // $test = $this->subject->find(343);
        // dd($test);
        return view('backend.subject.index',compact('subjects','programs','faculties','grades'))->with('title','Subjects');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-subject'))
            abort(403, 'Unauthorized action.');
        $subject       = $this->subject;
        $programs      = $this->program->pluck('name','id');

        return view('backend.subject.create',compact('programs','subject'))->with('title','Create Subject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        if(!auth()->user()->can('create-subject'))
            abort(403, 'Unauthorized action.');

        $this->subject->name                   = $request->name;
        $this->subject->slug                   = $request->slug;
        $this->subject->image                  = $request->image;
        $this->subject->description            = $request->description;
        $this->subject->status                 = $request->status;
        $this->subject->program_id             = $request->program_id;
        $this->subject->faculty_id             = $request->faculty_id;
        $this->subject->grade_id               = $request->grade_id;
        $this->subject->code                   = $request->code;
        $this->subject->created_by             = auth()->id();
        $this->subject->meta_keyword           = $request->meta_keyword;
        $this->subject->meta_title             = $request->meta_title;
        $this->subject->meta_description       = $request->meta_description;

        if( $this->subject->save() ){
            session()->flash('success','Subject Created');
            return redirect()->route('subject.index');
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
        if(!auth()->user()->can('edit-subject'))
            abort(403, 'Unauthorized action.');

        $subject          = $this->subject->find($id);
    
        $programs         = $this->program->pluck('name','id');
        $faculties         = $this->faculty->pluck('name','id');

        return view('backend.subject.edit',compact('programs','faculties','subject'))->with('title','Edit Subject');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubjectRequest $request, $id)
    {
        if(!auth()->user()->can('edit-subject'))
            abort(403, 'Unauthorized action.');

        $subject                         = $this->subject->find($id);
   
        $subject->name                   = $request->name;
        $subject->slug                   = $request->slug;
        $subject->image                  = $request->image;
        $subject->description            = $request->description;
        $subject->status                 = $request->status;
        $subject->program_id             = $request->program_id;
        $subject->faculty_id             = $request->faculty_id;
        $subject->grade_id               = $request->grade_id;
        $subject->code                   = $request->code;
        $subject->meta_keyword           = $request->meta_keyword;
        $subject->meta_title             = $request->meta_title;
        $subject->meta_description       = $request->meta_description;
        
        if( $subject->save() ){
            session()->flash('success', 'Subject Updated');
            return redirect()->route('subject.index');
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
        if(!auth()->user()->can('delete-subject'))
            abort(403, 'Unauthorized action.');

        $bool = $this->subject->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Subject deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-subject'))
            abort(403, 'Unauthorized action.');

        $subject        = $this->subject->with(['program','faculty','grade'])->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $subject        = $subject->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $subject        = $subject->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $subject        = $subject->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $subject        = $subject->where('grade_id',request('grade_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $subject        = $subject->where('status',request('status'));
        }

        $subjects           = $subject->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'status'            => request('status'),
        ]);

        $programs            = $this->program->pluck('name','id');
        $faculties           = $this->faculty->pluck('name','id');

        return view('backend.subject.trash',compact('subjects','programs','faculties'))->with('title','Soft Deleted Subjects');
    }

    public function restore($id)
    {
        $bool = $this->subject->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Subject restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->subject->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Subject deleted successfully",
            ]);
        }
    }

    public function getUnitsBySubject($id){
        return $this->subject->with('units')->find($id);
    }

    public function getLessonsBySubject($id){
        return $this->subject->with('lessons')->find($id);
    }

    public function getImport(){
        if(!auth()->user()->can('create-lesson'))
            abort(403, 'Unauthorized action.');

        // if (request()->has('sample') AND !empty(request('sample'))) {
           
        //     return Excel::download(new ExportNoteSubjectiveQuestionsSample(collect([])), 'exercise-sample.xlsx');
        // }

        $programs           = $this->program->pluck('name','id');

        return view('backend.subject.import',compact('programs'))->with('title','Import Subjects');
    }

    public function import(Request $request){
        if(!auth()->user()->can('create-subject'))
            abort(403, 'Unauthorized action.');

        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx',
            'program_id'  => 'required|exists:programs,id',
            'faculty_id'  => 'required|exists:faculties,id',
            'grade_id'    => 'required|exists:grades,id',
        ]);


        try {
            Excel::import(new ImportSubjects($request->program_id,$request->faculty_id,$request->grade_id), request()->file('import_file'));
            session()->flash('success', 'Subjects Imported');
            return redirect()->route('subject.index');

        } catch(\Exception $e){
            session()->flash('error', $e->getMessage());
            return redirect()->back();
        }
    }
}
