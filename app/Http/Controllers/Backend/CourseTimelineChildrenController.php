<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTimeline;
use App\Models\CourseTimelineChild;
use App\Http\Requests\CourseTimelineChild\StoreCourseTimelineChildRequest;
use App\Http\Requests\CourseTimelineChild\UpdateCourseTimelineChildRequest;

class CouresTimelineChildrenController extends Controller
{
    private $courseTimeline;
    private $courseTimelineChild;

    public function __construct(CourseTimelineChild $courseTimelineChild, CourseTimeline $courseTimeline)
    {
        $this->middleware('auth:admin');
        $this->courseTimeline          = $courseTimeline;
        $this->courseTimelineChild     = $courseTimelineChild;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-study-period'))
            abort(403, 'Unauthorized action.');

        $courseTimelineChild        = $this->courseTimelineChild->with('parent');

        if (request()->has('q')) {
            $name           = request('q');
            $courseTimelineChild        = $courseTimelineChild->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('study_period_id') AND !empty(request('study_period_id'))) {
            $courseTimelineChild        = $courseTimelineChild->where('study_period_id',request('study_period_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $courseTimelineChild        = $courseTimelineChild->where('status',request('status'));
        }

        $courseTimelineChilds           = $courseTimelineChild->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'study_period_id'   => request('study_period_id'),
            'status'            => request('status'),
        ]);

        return view('backend.study-period-child.index',compact('courseTimelineChilds'))->with('title','Study Period Children');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-study-period'))
            abort(403, 'Unauthorized action.');
        $courseTimelineChild        = $this->courseTimelineChild;
        $courseTimelines             = $this->courseTimeline->pluck('name','id');
        return view('backend.study-period-child.create',compact('courseTimelines','courseTimelineChild'))->with('title','Create Study Period Child');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecourseTimelineChildRequest $request)
    {
        if(!auth()->user()->can('create-study-period'))
            abort(403, 'Unauthorized action.');

        $this->courseTimelineChild->name                   = $request->name;
        $this->courseTimelineChild->study_period_id        = $request->study_period_id;
        $this->courseTimelineChild->status                 = $request->status;
    
        if( $this->courseTimelineChild->save() ){
            session()->flash('success','Study Period Child Created');
            return redirect()->route('study-period-child.index');
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
        if(!auth()->user()->can('edit-study-period'))
            abort(403, 'Unauthorized action.');

        $courseTimelineChild    = $this->courseTimelineChild->find($id);
        $courseTimelines        = $this->courseTimeline->pluck('name','id');
        
        return view('backend.study-period-child.edit',compact('courseTimelines','courseTimelineChild'))->with('title','Edit Study Period');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecourseTimelineChildRequest $request, $id)
    {
        if(!auth()->user()->can('edit-study-period'))
            abort(403, 'Unauthorized action.');

        $courseTimelineChild                    = $this->courseTimelineChild->find($id);
        $courseTimelineChild->name              = $request->name;
        $courseTimelineChild->study_period_id   = $request->study_period_id;
        $courseTimelineChild->status            = $request->status;
       
        if( $courseTimelineChild->save() ){
            session()->flash('success', 'Study Period Child Updated');
            return redirect()->route('study-period-child.index');
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
        if(!auth()->user()->can('delete-study-period'))
            abort(403, 'Unauthorized action.');

        $bool = $this->courseTimelineChild->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Study Period Child Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-study-period'))
            abort(403, 'Unauthorized action.');

        $courseTimelineChild        = $this->courseTimelineChild->onlyTrashed()->with('parent');

        if (request()->has('q')) {
            $name           = request('q');
            $courseTimelineChild        = $courseTimelineChild->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('study_period_id') AND !empty(request('study_period_id'))) {
            $courseTimelineChild        = $courseTimelineChild->where('study_period_id',request('study_period_id'));
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $courseTimelineChild        = $courseTimelineChild->where('status',request('status'));
        }

        $courseTimelineChilds           = $courseTimelineChild->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'study_period_id'   => request('study_period_id'),
            'status'            => request('status'),
        ]);

        return view('backend.study-period-child.trash',compact('courseTimelineChilds'))->with('title','Soft Deleted Study Period Children');
    }

    public function restore($id)
    {
        $bool = $this->courseTimelineChild->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Study Period Child restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->courseTimelineChild->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Study Period Child deleted successfully",
            ]);
        }
    }
}
