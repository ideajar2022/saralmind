<?php

namespace App\Http\Controllers\Backend;

use App\Models\Bug;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BugsController extends Controller
{
    private $bug;

    public function __construct(Bug $bug)
    {
        $this->middleware('auth:admin');
        $this->bug      = $bug;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-bug'))
            abort(403, 'Unauthorized action.');

        $bug        = $this->bug;

        if (request()->has('q')) {
            $q           = request('q');
            $bug       = $bug->where('bug','LIKE',"%{$q}%");
        }

        if (request()->has('status')) {
            $bug       = $bug->where('status',request('status'));
        }
       
        $bugs           = $bug->latest()->paginate(50)->appends([
            'q'                 => request('q'),
            'status'            => request('status'),
        ]);

        return view('backend.bug.index',compact('bugs'))->with('title','Bugs');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	
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
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    	if(!auth()->user()->can('delete-bug'))
            abort(403, 'Unauthorized action.');

        $bool = $this->bug->where('id', $id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Bug deleted successfully",
            ]);
        }
    }
}
