<?php

namespace App\Http\Controllers\Backend;

use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\StoreAdminRequest;
use App\Http\Requests\Admin\UpdateAdminRequest;

class AdminsController extends Controller
{
    private $admin;
    private $role;
	private $permission;

    public function __construct(
        Admin $admin,
        Role $role,
        Permission $permission
    )
    {
        $this->middleware('auth:admin');
        $this->admin        = $admin;
        $this->role         = $role;
        $this->permission   = $permission;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->can('view-admin-user'))
            abort(403, 'Unauthorized action.');

        $admin        = $this->admin;

        if (request()->has('q')) {
            $name           = request('q');
            $admin  = $admin->where('name','LIKE',"%{$name}%");
                        // ->orWhere('email', 'LIKE', "%{$name}%"); 
                        //fuck 2 hours spent
        }

        if (request()->has('role_id') AND !empty(request('role_id'))) {
            $role_id    = request('role_id'); 

            $admin      = $admin->whereHas('roles', function($q) use ($role_id) {
                            $q->whereIn('id', [$role_id]);
                        });
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $admin        = $admin->where('status',request('status'));
        }

        $admins           = $admin->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'role_id'           => request('role_id'),
            'status'            => request('status'),
        ]);

        $roles              = $this->role->pluck('name','id');

        return view('backend.admin.index',compact('admins','roles'))->with('title','Admins');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->can('create-admin-user'))
            abort(403, 'Unauthorized action.');

        $admin              = $this->admin;
        $roles              = $this->role->pluck('name','id');
        $permissions        = $this->permission->pluck('name','id');
    
        return view('backend.admin.create',compact('admin','roles','permissions'))->with('title','Create Admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        if(!auth()->user()->can('create-admin-user'))
            abort(403, 'Unauthorized action.');

        $this->admin->name             = $request->name;
        $this->admin->email            = $request->email;
        $this->admin->phone_no         = $request->phone_no;
        $this->admin->password         = bcrypt( $request->password );
        $this->admin->status           = $request->status;
    
        if( $this->admin->save() ){
            if (request()->has('role')) {
                $roles = (!empty($request->role) ? [$request->role] : []);
                $this->admin->roles()->attach($roles);
                $role               = $this->role->with('permissions')->find($request->role);
                $this->admin->permissions()->attach($role->permissions ?? []);
            }
            
            session()->flash('success','Admin User Created');
            return redirect()->route('admin-user.index');
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
        if(!auth()->user()->can('edit-admin-user'))
            abort(403, 'Unauthorized action.');

        $admin              = $this->admin->with(['roles','permissions'])->find($id);
        $roles              = $this->role->pluck('name','id');

        $permissions        = $this->permission->pluck('name','id');
        return view('backend.admin.edit',compact('admin','roles','permissions'))->with('title','Edit Admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, $id)
    {
        if(!auth()->user()->can('edit-admin-user'))
            abort(403, 'Unauthorized action.');

        $admin                   = $this->admin->find($id);
        
        $admin->name             = $request->name;
        $admin->email            = $request->email;
        $admin->phone_no         = $request->phone_no;
        if (request()->has('update_password_check')) {
            $admin->password         = bcrypt( $request->password );
        }
        $admin->status           = $request->status;
   
        if( $admin->save() ){
            if (request()->has('role')) {
                $roles = (!empty($request->role) ? [$request->role] : []);
                $admin->roles()->sync($roles);
                $role               = $this->role->with('permissions')->find($request->role);
            
                $admin->permissions()->sync($role->permissions ?? []);
            }
            session()->flash('success', 'Admin Updated');
            return redirect()->route('admin-user.index');
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
        if(!auth()->user()->can('delete-admin-user'))
            abort(403, 'Unauthorized action.');

        $bool = $this->admin->find($id)->delete();
        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Admin Deleted Successfully",
            ]);
        }
    }

    public function getSoftDeleted()
    {
        if(!auth()->user()->can('view-admin-user'))
            abort(403, 'Unauthorized action.');

        $admin        = $this->admin->onlyTrashed();

        if (request()->has('q')) {
            $name           = request('q');
            $admin  = $admin->where('name','LIKE',"%{$name}%");
                    
        }

        if (request()->has('role_id') AND !empty(request('role_id'))) {
            $role_id    = request('role_id'); 

            $admin      = $admin->whereHas('roles', function($q) use ($role_id) {
                            $q->whereIn('id', [$role_id]);
                        });
        }

        if (request()->has('status') AND !empty(request('status'))) {
            $admin        = $admin->where('status',request('status'));
        }

        $admins           = $admin->latest()->paginate(50)->appends([
            'q'                 => request('name'),
            'role_id'           => request('role_id'),
            'status'            => request('status'),
        ]);

        $roles              = $this->role->pluck('name','id');

        return view('backend.admin.trash',compact('admins','roles'))->with('title','Soft Deleted Admins');
    }

    public function restore($id)
    {
        $bool = $this->admin->onlyTrashed()->find($id)->restore();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Admin restore successfully",
            ]);
        }
    }

    public function permanentDelete($id)
    {
        $bool = $this->admin->onlyTrashed()->find($id)->forceDelete();

        if ($bool == 1) {
           return response()->json([
                'success' => true,
                'message' => "Admin deleted successfully",
            ]);
        }
    }

}
