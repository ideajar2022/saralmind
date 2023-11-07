<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Module\StoreModuleRequest;
use App\Http\Requests\Module\UpdateModuleRequest;

class ModulesController extends Controller
{
	private $module;

    public function __construct(Module $module)
    {
        $this->middleware('auth:admin');
        $this->module  = $module;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-module'))
            abort(403, 'Unauthorized action.');

        $module        = $this->module;

        if (request()->has('q')) {
            $name           = request('q');
            $module        = $module->where('name','LIKE',"%{$name}%");
        }
        $modules           = $module->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.module.index',compact('modules'))->with('title','Modules');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-module'))
            abort(403, 'Unauthorized action.');

        $module        = $this->module;
        return view('backend.module.create',compact('module'))->with('title','Create Module');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreModuleRequest $request)
    {
    	if(!auth()->user()->can('create-module'))
            abort(403, 'Unauthorized action.');

        $this->module->name            = $request->name;
        $this->module->slug            = $request->slug;
    
        if( $this->module->save() ){
            session()->flash('success','Module Created');
            return redirect()->route('module.index');
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
    	if(!auth()->user()->can('edit-module'))
            abort(403, 'Unauthorized action.');

        $module    = $this->module->find($id);
        return view('backend.module.edit',compact('module'))->with('title','Edit Module');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateModuleRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-module'))
            abort(403, 'Unauthorized action.');

        $module                 = $this->module->find($id);
        $module->name           = $request->name;
        $module->slug           = $request->slug;
   
        if( $module->save() ){
            session()->flash('success', 'Module Updated');
            return redirect()->route('module.index');
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
    	if(!auth()->user()->can('delete-module'))
            abort(403, 'Unauthorized action.');

        $bool = $this->module->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Module Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-module'))
            abort(403, 'Unauthorized action.');

        $module        = $this->module->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $module        = $module->where('name','LIKE',"%{$name}%");
        }
        $modules           = $module->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'status'            => request('status'),
        ]);

        return view('backend.module.trash',compact('modules'))->with('title','Soft Deleted Modules');
    }

    public function restore($id)
    {
        $bool = $this->module->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Module restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->module->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Module deleted successfully",
            ]);
        }
    }

}
