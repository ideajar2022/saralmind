<?php

namespace App\Http\Controllers\Backend;

use App\Models\Award;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Award\StoreAwardRequest;
use App\Http\Requests\Award\UpdateAwardRequest;

class AwardsController extends Controller
{
	private $award;
    public function __construct(Award $award)
    {
        $this->middleware('auth:admin');
        $this->award  = $award;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-award'))
            abort(403, 'Unauthorized action.');

        $award        = $this->award;

        if (request()->has('q')) {
            $name           = request('q');
            $award        = $award->where('title','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $award        = $award->where('status',request('status'));
        }
        $awards           = $award->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.award.index',compact('awards'))->with('title','Awards');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-award'))
            abort(403, 'Unauthorized action.');

        $award        = $this->award;
        return view('backend.award.create',compact('award'))->with('title','Create Award');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAwardRequest $request)
    {
    	if(!auth()->user()->can('create-award'))
            abort(403, 'Unauthorized action.');
       
        $this->award->title           = $request->title;
        $this->award->slug            = $request->slug;
        $this->award->image            = $request->image;
        $this->award->awarded_at      = $request->awarded_at;
        $this->award->description     = $request->description;
        $this->award->status          = $request->status;
        $this->award->created_by      = auth()->id();
    
        if( $this->award->save() ){
            session()->flash('success','Award Created');
            return redirect()->route('award.index');
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
    	if(!auth()->user()->can('edit-award'))
            abort(403, 'Unauthorized action.');

        $award    = $this->award->find($id);
        return view('backend.award.edit',compact('award'))->with('title','Edit award');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAwardRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-award'))
            abort(403, 'Unauthorized action.');

        $award                  = $this->award->find($id);
        $award->title           = $request->title;
        $award->slug            = $request->slug;
        $award->image            = $request->image;
        $award->awarded_at      = $request->awarded_at;
        $award->description     = $request->description;
        $award->status          = $request->status;
   
        if( $award->save() ){
            session()->flash('success', 'Award Updated');
            return redirect()->route('award.index');
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
    	if(!auth()->user()->can('delete-award'))
            abort(403, 'Unauthorized action.');

        $bool = $this->award->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Award Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-award'))
            abort(403, 'Unauthorized action.');

        $award        = $this->award->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $award        = $award->where('title','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $award        = $award->where('status',request('status'));
        }
        $awards           = $award->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.award.trash',compact('awards'))->with('title','Soft Deleted Awards');
    }

    public function restore($id)
    {
        $bool = $this->award->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Award restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->award->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Award deleted successfully",
            ]);
        }
    }

}
