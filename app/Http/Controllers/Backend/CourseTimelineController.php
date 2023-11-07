<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseTimeline;
use App\Http\Requests\CourseTimeline\StoreCourseTimelineRequest;
use App\Http\Requests\CourseTimeline\UpdateCourseTimelineRequest;

class CourseTimelineController extends Controller
{
    private $courseTimeline;

    public function __construct(CourseTimeline $courseTimeline)
    {
        $this->middleware('auth:admin');
        $this->courseTimeline  = $courseTimeline;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-course-timeline'))
            abort(403, 'Unauthorized action.');

        $courseTimeline        = $this->courseTimeline;

        if (request()->has('q')) {
            $name           = request('q');
            $courseTimeline        = $courseTimeline->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $courseTimeline        = $courseTimeline->where('status',request('status'));
        }

        $courseTimelines           = $courseTimeline->latest('id')->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.course-timeline.index',compact('courseTimelines'))->with('title','Course Timelines');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-course-timeline'))
            abort(403, 'Unauthorized action.');
        $courseTimeline        = $this->courseTimeline;
        return view('backend.course-timeline.create',compact('courseTimeline'))->with('title','Create Course Timeline');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseTimelineRequest $request)
    {
        if(!auth()->user()->can('create-course-timeline'))
            abort(403, 'Unauthorized action.');

        $this->courseTimeline->name                   = $request->name;
        $this->courseTimeline->status                 = $request->status;
    
        if( $this->courseTimeline->save() ){
            session()->flash('success','Course Timeline Created');
            return redirect()->route('course-timeline.index');
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
        if(!auth()->user()->can('edit-course-timeline'))
            abort(403, 'Unauthorized action.');

        $courseTimeline    = $this->courseTimeline->find($id);
        return view('backend.course-timeline.edit',compact('courseTimeline'))->with('title','Edit Course Timeline');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseTimelineRequest $request, $id)
    {
        if(!auth()->user()->can('edit-course-timeline'))
            abort(403, 'Unauthorized action.');

        $courseTimeline                    = $this->courseTimeline->find($id);
        $courseTimeline->name              = $request->name;
        $courseTimeline->status            = $request->status;
       
        if( $courseTimeline->save() ){
            session()->flash('success', 'Course Timeline Updated');
            return redirect()->route('course-timeline.index');
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
        if(!auth()->user()->can('delete-course-timeline'))
            abort(403, 'Unauthorized action.');

        $bool = $this->courseTimeline->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Course Timeline Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-course-timeline'))
            abort(403, 'Unauthorized action.');

        $courseTimeline        = $this->courseTimeline->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $courseTimeline        = $courseTimeline->where('name','LIKE',"%{$name}%");
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $courseTimeline        = $courseTimeline->where('status',request('status'));
        }

        $courseTimelines           = $courseTimeline->latest('id')->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.course-timeline.trash',compact('courseTimelines'))->with('title','Soft Deleted Course Timeline');
    }

    public function restore($id)
    {
        $bool = $this->courseTimeline->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Course Timeline restored successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->courseTimeline->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Course Timeline deleted successfully",
            ]);
        }
    }

    public function getCourseTimelineChildrenByParent($id){
         return $this->courseTimeline->with('children')->find($id);
    }
}
