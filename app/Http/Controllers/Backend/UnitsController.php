<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Faculty;
use App\Models\Grade;
use App\Models\Subject;
use App\Models\Unit;
use App\Exports\ExportUnits;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Unit\StoreUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;

class UnitsController extends Controller
{
    private $program;
    private $faculty;
    private $grade;
    private $subject;
    private $unit;

    public function __construct(Unit $unit, Program $program, Faculty $faculty, Grade $grade, Subject $subject)
    {
        $this->middleware('auth:admin');
        $this->program      = $program;
        $this->faculty      = $faculty;
        $this->grade        = $grade;
        $this->subject      = $subject;
        $this->unit         = $unit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-unit'))
            abort(403, 'Unauthorized action.');

        $unit        = $this->unit->with(['program','grade','subject']);

        if (request()->has('q')) {
            $name           = request('q');
            $unit        = $unit->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $unit        = $unit->where('program_id',request('program_id'));
        }

        if (request()->has('faculty_id') AND !empty(request('faculty_id'))) {
            $unit        = $unit->where('faculty_id',request('faculty_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $unit        = $unit->where('grade_id',request('grade_id'));
        }

         if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $unit        = $unit->where('subject_id',request('subject_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $unit        = $unit->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $unit->latest()->get();
            return Excel::download(new ExportUnits($result), 'units.xlsx');
        }

        $units           = $unit->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'faculty_id'        => request('faculty_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.unit.index',compact('units','programs'))->with('title','Units');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-unit'))
            abort(403, 'Unauthorized action.');
        $unit      = $this->unit;
        $programs     = $this->program->pluck('name','id');
        $faculties     = $this->faculty->pluck('name','id');

        return view('backend.unit.create',compact('programs','faculties','unit'))->with('title','Create Unit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {
        if(!auth()->user()->can('create-unit'))
            abort(403, 'Unauthorized action.');

        $this->unit->name                   = $request->name;
        $this->unit->slug                   = $request->slug;
        $this->unit->image                   = $request->image;
        $this->unit->description            = $request->description;
        $this->unit->status                 = $request->status;
        $this->unit->program_id             = $request->program_id;
        $this->unit->grade_id               = $request->grade_id;
        $this->unit->subject_id             = $request->subject_id;
        $this->unit->created_by             = auth()->id();
        $this->unit->meta_keyword           = $request->meta_keyword;
        $this->unit->meta_title             = $request->meta_title;
        $this->unit->meta_description       = $request->meta_description;
        if( $this->unit->save() ){
            session()->flash('success','Unit Created');
            return redirect()->route('unit.index');
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
        if(!auth()->user()->can('edit-unit'))
            abort(403, 'Unauthorized action.');

        $unit          = $this->unit->find($id);
    
        $programs      = $this->program->pluck('name','id');

        return view('backend.unit.edit',compact('programs','unit'))->with('title','Edit Unit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitRequest $request, $id)
    {
        if(!auth()->user()->can('edit-unit'))
            abort(403, 'Unauthorized action.');
        
        $unit                         = $this->unit->find($id);

        $unit->name                   = $request->name;
        $unit->slug                   = $request->slug;
        $unit->image                   = $request->image;
        $unit->description            = $request->description;
        $unit->status                 = $request->status;
        $unit->program_id             = $request->program_id;
        $unit->grade_id               = $request->grade_id;
        $unit->subject_id             = $request->subject_id;
        $unit->meta_keyword           = $request->meta_keyword;
        $unit->meta_title             = $request->meta_title;
        $unit->meta_description       = $request->meta_description;
        if( $unit->save() ){
            session()->flash('success', 'Unit Updated');
            return redirect()->route('unit.index');
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
        if(!auth()->user()->can('delete-unit'))
            abort(403, 'Unauthorized action.');

        $bool = $this->unit->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Unit deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-unit'))
            abort(403, 'Unauthorized action.');

        $unit        = $this->unit->with(['program','grade','subject'])->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $unit        = $unit->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $unit        = $unit->where('program_id',request('program_id'));
        }

        if (request()->has('grade_id') AND !empty(request('grade_id'))) {
            $unit        = $unit->where('grade_id',request('grade_id'));
        }

         if (request()->has('subject_id') AND !empty(request('subject_id'))) {
            $unit        = $unit->where('subject_id',request('subject_id'));
        }


        if (request()->has('status') AND !empty(request('status'))) {
            $unit        = $unit->where('status',request('status'));
        }

        $units           = $unit->latest()->paginate(20)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'grade_id'          => request('grade_id'),
            'subject_id'        => request('subject_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.unit.trash',compact('units','programs'))->with('title','Soft Deleted Units');
    }

    public function restore($id)
    {
        $bool = $this->unit->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Unit restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->unit->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Unit deleted successfully",
            ]);
        }
    }

    public function getLessonsByUnit($id){
        return $this->unit->with('lessons')->find($id);
    }
}
