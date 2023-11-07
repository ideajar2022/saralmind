<?php

namespace App\Http\Controllers\Backend;

use App\Models\Module;
use App\Models\Role;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Role\StoreRoleRequest;
use App\Http\Requests\Role\UpdateRoleRequest;

class RolesController extends Controller
{
    private $module;
    private $role;

    public function __construct(Module $module, Role $role)
    {
        $this->middleware('auth:admin');
        $this->module       = $module;
        $this->role         = $role;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-role'))
            abort(403, 'Unauthorized action.');

        $role        = $this->role;

        if (request()->has('q')) {
            $name           = request('q');
            $role           = $role->where('name','LIKE',"%{$name}%");
        }

        $roles           = $role->latest()->paginate(50)->appends([
            'q'                 => request('name')
        ]);

        return view('backend.role.index',compact('roles'))->with('title','Roles');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-role'))
            abort(403, 'Unauthorized action.');

        $role              = $this->role;
        $modules           = $this->module->with('permissions')->get();
        return view('backend.role.create',compact('modules','role'))->with('title','Create Role');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        if(!auth()->user()->can('create-role'))
            abort(403, 'Unauthorized action.');

        $this->role->name            = $request->name;
        $this->role->slug            = $request->slug;
    
        if( $this->role->save() ){
            $this->role->permissions()->attach($request->permissions ?? []);
            session()->flash('success','Role Created');
            return redirect()->route('role.index');
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
        if(!auth()->user()->can('edit-role'))
            abort(403, 'Unauthorized action.');

        $role               = $this->role->with('permissions')->find($id);
        $modules            = $this->module->with('permissions')->get();
        return view('backend.role.edit',compact('role','modules'))->with('title','Edit Role');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        if(!auth()->user()->can('edit-role'))
            abort(403, 'Unauthorized action.');

        $role                 = $this->role->find($id);
        $role->name           = $request->name;
        $role->slug           = $request->slug;
   
        if( $role->save() ){
            $role->permissions()->sync($request->permissions ?? []);

            //update all existing admin permissions

            $admins      = Admin::whereHas('roles', function($q) use ($id) {
                                $q->whereIn('id', [$id]);
                            })->pluck('id');

            $totalAdmins = count($admins);

             for ($i=0; $i < ($totalAdmins); $i++) { 

                $admin      = Admin::find($admins[$i]);
                $admin->permissions()->sync($role->permissions ?? []);
             }

            session()->flash('success', 'Role Updated');
            return redirect()->route('role.index');
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
        if(!auth()->user()->can('delete-role'))
            abort(403, 'Unauthorized action.');

        $bool = $this->role->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Role Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-role'))
            abort(403, 'Unauthorized action.');

        $role        = $this->role->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $role           = $role->where('name','LIKE',"%{$name}%");
        }

        $roles           = $role->latest()->paginate(50)->appends([
            'q'                 => request('name')
        ]);

        return view('backend.role.trash',compact('roles'))->with('title','Soft Deleted Roles');
    }

    public function restore($id)
    {
        $bool = $this->role->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Role restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->role->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Role deleted successfully",
            ]);
        }
    }

}
