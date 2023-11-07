<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Program;
use App\Exports\ExportPrograms;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Program\StoreProgramRequest;
use App\Http\Requests\Program\UpdateProgramRequest;

class ProgramsController extends Controller
{
    private $program;

    public function __construct(Program $program)
    {
        $this->middleware('auth:admin');
        $this->program  = $program;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-program'))
            abort(403, 'Unauthorized action.');

        $program        = $this->program;

        if (request()->has('q')) {
            $name           = request('q');
            $program        = $program->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $program        = $program->where('status',request('status'));
        }

        if (request()->has('export') AND !empty(request('export'))) {
            $result = $program->latest()->get();
            return Excel::download(new ExportPrograms($result), 'programs.xlsx');
        }


        $programs           = $program->latest()->paginate(10)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.program.index',compact('programs'))->with('title','Programs');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-program'))
            abort(403, 'Unauthorized action.');
        $program        = $this->program;
        return view('backend.program.create',compact('program'))->with('title','Create Program');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProgramRequest $request)
    {
        if(!auth()->user()->can('create-program'))
            abort(403, 'Unauthorized action.');

        $this->program->name                   = $request->name;
        $this->program->slug                   = $request->slug;
        $this->program->description            = $request->description;
        $this->program->status                 = $request->status;
        $this->program->created_by             = auth()->id();
        $this->program->meta_keyword           = $request->meta_keyword;
        $this->program->meta_title             = $request->meta_title;
        $this->program->meta_description       = $request->meta_description;
    
        if( $this->program->save() ){
            session()->flash('success','Program Created');
            return redirect()->route('program.index');
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
        if(!auth()->user()->can('edit-program'))
            abort(403, 'Unauthorized action.');

        $program    = $this->program->find($id);
        return view('backend.program.edit',compact('program'))->with('title','Edit Program');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProgramRequest $request, $id)
    {
        if(!auth()->user()->can('edit-program'))
            abort(403, 'Unauthorized action.');

        $program                    = $this->program->find($id);
        $program->name              = $request->name;
        $program->slug              = $request->slug;
        $program->status            = $request->status;
        $program->description       = $request->description;
        $program->meta_keyword           = $request->meta_keyword;
        $program->meta_title             = $request->meta_title;
        $program->meta_description       = $request->meta_description;
        
        if( $program->save() ){
            session()->flash('success', 'Program Updated');
            return redirect()->route('program.index');
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
        if(!auth()->user()->can('delete-program'))
            abort(403, 'Unauthorized action.');

        $bool = $this->program->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Program deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted(){
        if(!auth()->user()->can('view-program'))
            abort(403, 'Unauthorized action.');

        $program        = $this->program->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $program        = $program->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $program        = $program->where('status',request('status'));
        }

        $programs           = $program->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.program.trash',compact('programs'))->with('title','Soft Deleted Programs');
    }

    public function restore($id)
    {
        $bool = $this->program->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Program restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->program->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Program deleted successfully",
            ]);
        }
    }

    // public function getGradesByProgram($id){
    //     return $this->program->with('grades')->find($id);
    // }

    public function getFacultiesByProgram($id){
        return $this->program->with('faculties')->find($id);
    }
}
