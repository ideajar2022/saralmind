<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTimeline;
use App\Models\CourseTimelineChild;
use App\Models\Program;
use App\Models\Faculty;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Faculty\StoreFacultyRequest;
use App\Http\Requests\Faculty\UpdateFacultyRequest;

class FacultiesController extends Controller
{
    private $faculty;
    private $courseTimeline;
    private $program;

    public function __construct(Program $program, Faculty $faculty, CourseTimeline $courseTimeline, CourseTimelineChild $courseTimelineChild)
    {
        $this->middleware('auth:admin');
        $this->program      = $program;
        $this->faculty        = $faculty;
        $this->courseTimeline  = $courseTimeline;
        $this->courseTimelineChild  = $courseTimelineChild;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-faculty')){
            abort(403, 'Unauthorized action.');    
        }

        $test = $this->faculty->with('grades')->find(1);

        $faculty        = $this->faculty->with(['program']);

        if (request()->has('q')) {
            $name           = request('q');
            $faculty        = $faculty->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $faculty        = $faculty->where('program_id',request('program_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $faculty        = $faculty->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $faculty->latest()->get();
            return Excel::download(new ExportFaculties($result), 'Faculties.xlsx');
        }
      
        $faculties           = $faculty->latest()->paginate(10)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.faculty.index',compact('faculties','programs'))->with('title','Faculties');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        if(!auth()->user()->can('create-faculty'))
            abort(403, 'Unauthorized action.');
        $faculty        = $this->faculty;
        $programs      = $this->program->pluck('name','id');
        $courseTimelines = $this->courseTimeline->pluck('name','id');

        return view('backend.faculty.create',compact('programs','faculty','courseTimelines'))->with('title','Create Faculty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFacultyRequest $request)
    {
        if(!auth()->user()->can('create-faculty'))
            abort(403, 'Unauthorized action.');

        $this->faculty->name                   = $request->name;
        $this->faculty->slug                   = $request->slug;
        $this->faculty->image                  = $request->image;
        $this->faculty->description            = $request->description;
        $this->faculty->status                 = $request->status;
        $this->faculty->program_id             = $request->program_id;
        $this->faculty->study_period_parent_id = $request->study_period_parent_id;
        $this->faculty->created_by             = auth()->id();
        $this->faculty->meta_keyword           = $request->meta_keyword;
        $this->faculty->meta_title             = $request->meta_title;
        $this->faculty->meta_description       = $request->meta_description;
    
        if( $this->faculty->save() ){
            session()->flash('success','Faculty Created');
            return redirect()->route('faculty.index');
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
        if(!auth()->user()->can('edit-faculty'))
            abort(403, 'Unauthorized action.');

        $faculty          = $this->faculty->find($id);
        $programs       = $this->program->pluck('name','id');
        $courseTimelines   = $this->courseTimeline->pluck('name','id');

        return view('backend.faculty.edit',compact('programs','courseTimelines','faculty'))->with('title','Edit Faculty');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function update(UpdateFacultyRequest $request, $id)
    {
        if(!auth()->user()->can('edit-faculty'))
            abort(403, 'Unauthorized action.');

        $faculty                         = $this->faculty->find($id);
        $faculty->name                   = $request->name;
        $faculty->slug                   = $request->slug;
        $faculty->image                  = $request->image;
        $faculty->description            = $request->description;
        $faculty->status                 = $request->status;
        $faculty->program_id             = $request->program_id;
        $faculty->study_period_parent_id = $request->study_period_parent_id;
        $faculty->meta_keyword           = $request->meta_keyword;
        $faculty->meta_title             = $request->meta_title;
        $faculty->meta_description       = $request->meta_description;
        
        if( $faculty->save() ){
            session()->flash('success', 'Faculty Updated');
            return redirect()->route('faculty.index');
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
        if(!auth()->user()->can('delete-faculty'))
            abort(403, 'Unauthorized action.');

        $bool = $this->faculty->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Faculty deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-faculty'))
            abort(403, 'Unauthorized action.');

        $faculty        = $this->faculty->with(['program'])->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $faculty        = $faculty->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('program_id') AND !empty(request('program_id'))) {
            $faculty        = $faculty->where('program_id',request('program_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $faculty        = $faculty->where('status',request('status'));
        }

        $faculties           = $faculty->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'program_id'        => request('program_id'),
            'status'            => request('status'),
        ]);

        $programs           = $this->program->pluck('name','id');

        return view('backend.faculty.trash',compact('facultys','programs'))->with('title','Soft Deleted Faculties');
    }

    public function restore($id)
    {
        $bool = $this->faculty->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Faculty restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->faculty->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Faculty deleted successfully",
            ]);
        }
    }

    public function getGradesByFaculty($id){
        return $this->faculty->with('grades')->find($id);
    }

}
