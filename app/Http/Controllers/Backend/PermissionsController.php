<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Permission\StorePermissionRequest;
use App\Http\Requests\Permission\UpdatePermissionRequest;

class PermissionsController extends Controller
{
    private $module;
	private $permission;

    public function __construct(Module $module, Permission $permission)
    {
        $this->middleware('auth:admin');
        $this->module      = $module;
        $this->permission  = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	if(!auth()->user()->can('view-permission'))
            abort(403, 'Unauthorized action.');

        $permission        = $this->permission;

        if (request()->has('q')) {
            $name           = request('q');
            $permission     = $permission->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('module_id') AND !empty(request('module_id'))) {
            $permission        = $permission->where('module_id',request('module_id'));
        }
        $permissions           = $permission->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'module_id'         => request('module_id'),
        ]);

        $modules           = $this->module->pluck('name','id');
        return view('backend.permission.index',compact('permissions','modules'))->with('title','Permissions');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	if(!auth()->user()->can('create-permission'))
            abort(403, 'Unauthorized action.');

        $permission        = $this->permission;
        $modules           = $this->module->pluck('name','id');
        return view('backend.permission.create',compact('permission','modules'))->with('title','Create Permission');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermissionRequest $request)
    {
    	if(!auth()->user()->can('create-permission'))
            abort(403, 'Unauthorized action.');

        $this->permission->name            = $request->name;
        $this->permission->slug            = $request->slug;
        $this->permission->module_id       = $request->module_id;
    
        if( $this->permission->save() ){
            session()->flash('success','Permission Created');
            return redirect()->route('permission.index');
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
    	if(!auth()->user()->can('edit-permission'))
            abort(403, 'Unauthorized action.');

        $permission        = $this->permission->find($id);
        $modules           = $this->module->pluck('name','id');
        return view('backend.permission.edit',compact('permission','modules'))->with('title','Edit Permission');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermissionRequest $request, $id)
    {
    	if(!auth()->user()->can('edit-permission'))
            abort(403, 'Unauthorized action.');
        
        $permission                 = $this->permission->find($id);
        $permission->name           = $request->name;
        $permission->slug           = $request->slug;
        $permission->module_id      = $request->module_id;
   
        if( $permission->save() ){
            session()->flash('success', 'Permission Updated');
            return redirect()->route('permission.index');
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
    	if(!auth()->user()->can('delete-permission'))
            abort(403, 'Unauthorized action.');

        $bool = $this->permission->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Permission deleted successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-permission'))
            abort(403, 'Unauthorized action.');

        $permission        = $this->permission->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $permission     = $permission->where('name','LIKE',"%{$name}%");
        }
        if (request()->has('module_id') AND !empty(request('module_id'))) {
            $permission        = $permission->where('module_id',request('module_id'));
        }
        $permissions           = $permission->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'module_id'         => request('module_id'),
        ]);

        $modules           = $this->module->pluck('name','id');
        return view('backend.permission.trash',compact('permissions','modules'))->with('title','Soft Deleted Permissions');
    }

    public function restore($id)
    {
        $bool = $this->permission->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Permission restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->permission->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Permission deleted successfully",
            ]);
        }
    }
}
