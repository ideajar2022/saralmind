<?php

namespace App\Http\Controllers\Backend;

use App\Models\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Partner\StorePartnerRequest;
use App\Http\Requests\Partner\UpdatePartnerRequest;

class PartnersController extends Controller
{
	private $partner;
    public function __construct(Partner $partner)
    {
        $this->middleware('auth:admin');
        $this->partner  = $partner;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-partner'))
            abort(403, 'Unauthorized action.');

        $partner        = $this->partner;

        if (request()->has('q')) {
            $name           = request('q');
            $partner        = $partner->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $partner        = $partner->where('status',request('status'));
        }
        $partners           = $partner->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.partner.index',compact('partners'))->with('title','Partners');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-partner'))
            abort(403, 'Unauthorized action.');

        $partner        = $this->partner;
        return view('backend.partner.create',compact('partner'))->with('title','Create partner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerRequest $request)
    {
    	if(!auth()->user()->can('create-partner'))
            abort(403, 'Unauthorized action.');
        
        $this->partner->name            = $request->name;
        $this->partner->slug            = $request->slug;
        $this->partner->url             = $request->url;
        $this->partner->image           = $request->image;
        $this->partner->description     = $request->description;
        $this->partner->status          = $request->status;
        $this->partner->created_by      = auth()->id();
    
        if( $this->partner->save() ){
            session()->flash('success','partner Created');
            return redirect()->route('partner.index');
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
    	if(!auth()->user()->can('edit-partner'))
            abort(403, 'Unauthorized action.');

        $partner    = $this->partner->find($id);
        return view('backend.partner.edit',compact('partner'))->with('title','Edit partner');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePartnerRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-partner'))
            abort(403, 'Unauthorized action.');

        $partner                  = $this->partner->find($id);
        $partner->name            = $request->name;
        $partner->slug            = $request->slug;
        $partner->url             = $request->url;
        $partner->image           = $request->image;
        $partner->description     = $request->description;
        $partner->status          = $request->status;
   
        if( $partner->save() ){
            session()->flash('success', 'partner Updated');
            return redirect()->route('partner.index');
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
    	if(!auth()->user()->can('delete-partner'))
            abort(403, 'Unauthorized action.');

        $bool = $this->partner->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Partner Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-partner'))
            abort(403, 'Unauthorized action.');

        $partner        = $this->partner->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $partner        = $partner->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('status') AND !empty(request('status'))) {
            $partner        = $partner->where('status',request('status'));
        }
        $partners           = $partner->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.partner.trash',compact('partners'))->with('title','Soft Deleted Partners');
    }

    public function restore($id)
    {
        $bool = $this->partner->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Partner restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->partner->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Partner deleted successfully",
            ]);
        }
    }

}
