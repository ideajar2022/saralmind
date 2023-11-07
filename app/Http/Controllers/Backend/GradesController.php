<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Exports\ExportGrades;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Grade\StoreGradeRequest;
use App\Http\Requests\Grade\UpdateGradeRequest;

class GradesController extends Controller
{
    private $grade;
    private $program;
    private $faculty;

    public function __construct(Program $program, Faculty $faculty, Grade $grade)
    {
        $this->middleware('auth:admin');
        $this->program      = $program;
        $this->faculty      = $faculty;
        $this->grade        = $grade;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-grade')){
            abort(403, 'Unauthorized action.');    
        }

        $grade        = $this->grade->with(['program']);

        if (request()->has('q')) {
            $name           = request('q');
            $grade        = $grade->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $grade        = $grade->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $grade        = $grade->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $grade        = $grade->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $grade->latest()->get();
            return Excel::download(new ExportGrades($result), 'Grades.xlsx');
        }

        // $grades           = $grade->latest()->where('program_id','=','5')->paginate(50)->appends([
        //     'q'                 => request('name'),
        //     'program_id'        => request('program_id'),
        //     'status'            => request('status'),
        // ]);        
        $grades           = $grade->latest()->paginate(10)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');
        $faculties           = $this->faculty->pluck('name','id');

        return view('backend.grade.index',compact('grades','programs','faculties'))->with('title','Grades');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-grade'))
            abort(403, 'Unauthorized action.');
        $grade        = $this->grade;
        $programs     = $this->program->pluck('name','id');
       

        return view('backend.grade.create',compact('programs','grade'))->with('title','Create Grade');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGradeRequest $request)
    {
        if(!auth()->user()->can('create-grade'))
            abort(403, 'Unauthorized action.');

        $this->grade->name                   = $request->name;
        $this->grade->slug                   = $request->slug;
        $this->grade->image                  = $request->image;
        $this->grade->description            = $request->description;
        $this->grade->status                 = $request->status;
        $this->grade->program_id             = $request->program_id;
        $this->grade->faculty_id             = $request->faculty_id;
        $this->grade->created_by             = auth()->id();
        $this->grade->meta_keyword           = $request->meta_keyword;
        $this->grade->meta_title             = $request->meta_title;
        $this->grade->meta_description       = $request->meta_description;
    
        if( $this->grade->save() ){
            session()->flash('success','Grade Created');
            return redirect()->route('grade.index');
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
        if(!auth()->user()->can('edit-grade'))
            abort(403, 'Unauthorized action.');

        $grade          = $this->grade->find($id);
        $programs       = $this->program->pluck('name','id');
        $faculties       = $this->faculty->pluck('name','id');

        return view('backend.grade.edit',compact('programs','faculties','grade'))->with('title','Edit Grade');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGradeRequest $request, $id)
    {
        if(!auth()->user()->can('edit-grade'))
            abort(403, 'Unauthorized action.');

        $grade                         = $this->grade->find($id);
        $grade->name                   = $request->name;
        $grade->slug                   = $request->slug;
        $grade->image                  = $request->image;
        $grade->description            = $request->description;
        $grade->status                 = $request->status;
        $grade->program_id             = $request->program_id;
        $grade->faculty_id             = $request->faculty_id;
        $grade->meta_keyword           = $request->meta_keyword;
        $grade->meta_title             = $request->meta_title;
        $grade->meta_description       = $request->meta_description;
        
        if( $grade->save() ){
            session()->flash('success', 'Grade Updated');
            return redirect()->route('grade.index');
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
        if(!auth()->user()->can('delete-grade'))
            abort(403, 'Unauthorized action.');

        $bool = $this->grade->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Grade deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-grade'))
            abort(403, 'Unauthorized action.');

        $grade        = $this->grade->with(['program'])->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $grade        = $grade->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $grade        = $grade->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $grade        = $grade->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $grade        = $grade->where('status',request('status'));
        }

        $grades           = $grade->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');
        $faculties          = $this->faculty->pluck('name','id');

        return view('backend.grade.trash',compact('grades','programs','faculties'))->with('title','Soft Deleted Grades');
    }

    public function restore($id)
    {
        $bool = $this->grade->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Grade restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->grade->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Grade deleted successfully",
            ]);
        }
    }


    public function getSubjectsByGrade($id){
        return $this->grade->with('subjects')->find($id);
    }

    public function getUnitsByGrade($id){
        return $this->grade->with('units')->find($id);
    }


   
}
